<?php

class PlayerInfos extends RestProvider
{
    public function isHandler($url)
    {
        return $url === 'player_infos';
    }

    public function getDBTableName()
    {
        return 'jdr_player_infos';
    }

    public function getDBAllowedKeys()
    {
        return array(
            'player_real_name', 'name', 'origin', 'race', 'path', 'aug_total', 'aug_lost'
        );
    }

    public function getLabels()
    {
        return array(
            'aug' => App::t('aug'),
            'name_label' => App::t('nom'),
            'origin_name' => App::t('origine'),
            'race_label' => App::t('race'),
            'path_label' => App::t('Voie')
        );
    }
    
    public function handle($key)
    {
        $currentData = $this->get($key);
        Rest::$data['aug_lost'] = $currentData['aug_lost'];
        
        $data = Database::handleRequest($this->getDBTableName(), $key, $this->keyName, $this->getDBAllowedKeys(), Rest::$data);
        $data = array_merge($this->getData($data), $this->getLabels());
        
        Rest::send($data);
    }

    public function getData($data)
    {
        $data['origins'] = array(
            array('name' => App::t('originel')),
            array('name' => App::t('divin')),
            array('name' => App::t('démonique')),
            array('name' => App::t('élémentaire'))
        );

        switch (mb_strtolower($data['origin'])) {
            case 'originel' : $data['origin_number'] = 55;
                break;
            case 'divin' : $data['origin_number'] = 77;
                break;
            case 'démonique' : $data['origin_number'] = 66;
                break;
            case 'élémentaire' : $data['origin_number'] = 88;
                break;
        }
        
        $data['races'] = array(
            array('name' => App::t('humain')),
            array('name' => App::t('nain')),
            array('name' => App::t('elfe')),
            array('name' => App::t('génasi')),
            array('name' => App::t('semi-orque')),
            array('name' => App::t('halfling')),
            array('name' => App::t('tiefling'))
        );
        
        $data['paths'] = array(
            array('name' => App::t('combats')),
            array('name' => App::t('corps')),
            array('name' => App::t('athlète')),
            array('name' => App::t('magie')),
            array('name' => App::t('art')),
            array('name' => App::t('nature')),
            array('name' => App::t('social')),
            array('name' => App::t('académique'))
        );
        
        //Calc aug_count
        $data['aug_count'] = Rest::$rests['Charac']->countAug($data['id']);
        $data['aug_count'] += Rest::$rests['Skill']->countAug($data['id']);
        $data['aug_count'] += Rest::$rests['Spell']->countAug($data['id']);
        
        return $data;
    }

}