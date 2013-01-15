<?php

class Armory extends RestProvider
{
    private $playerLife;
    
    public function __construct()
    {
        $this->keyName = 'fk_player';
    }
    
    public function isHandler($url)
    {
        return $url === 'armory';
    }
    
    public function getDBTableName()
    {
        return 'jdr_armory';
    }
    
    public function getDBAllowedKeys()
    {
        return array(
            'name', 'hit', 'damage', 'crit', 'init', 'range', 'misc'
        );
    }

    public function getLabels()
    {
        return array(
            'name' => App::t('Nom'),
            'damage' => App::t('Dégâts'),
            'hit' => App::t('Touché'),
            'crit' => App::t('Crit'),
            'init' => App::t('Init'),
            'range' => App::t('Portée'),
        );
    }
    
    public function getData($data)
    {
        $newData = array();
        $newData['armory'] = array();
        
        if (sizeof($data) > 0) {
            $newData['id'] = $data[0]['fk_player'];
            
            $this->playerLife = Rest::restGet('Life', $data[0]['fk_player'], 'fk_skill');
            
            foreach($data as $armory) {
                $armory['hit'] = (($armory['hit'] - $this->getLifeMalus()) < 1) ? 1 : ($armory['hit'] - $this->getLifeMalus());
                if ($armory['hit'] < 10) {
                    $armory['hit'] = '0'.$armory['hit'];
                }
                $newData['armory'][] = $armory;
            }
        }
        
        return $newData;
    }
    
    public function handle($key)
    {
        Rest::send($this->get($key));
    }
    
    private function getLifeMalus() 
    {
        $malus = 0;
        if ($this->playerLife['light'] > 0) {
            $malus = 10;
        }
        if ($this->playerLife['intermediate'] > 0) {
            $malus = 20;
        }
        if ($this->playerLife['serious'] > 0) {
            $malus = 50;
        }
        
        return $malus;
    }
}