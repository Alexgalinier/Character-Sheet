<?php

class Life extends RestProvider
{
    public function isHandler($url)
    {
        return $url === 'life';
    }
    
    public function getDBTableName()
    {
        return 'jdr_life';
    }
    
    public function getDBAllowedKeys()
    {
        return array(
            'superficial', 'light', 'intermediate', 'serious', 'death'
        );
    }

    public function getLabels()
    {
        return array(
            'superficial_label' => App::t('Superficiel (S)'),
            'light_label' => App::t('Léger (L)'),
            'intermediate_label' => App::t('Moyen (M)'),
            'serious_label' => App::t('Grâve (G)'),
            'death_label' => App::t('Trépas (T)'),
        );
    }

    public function getData($data)
    {
        $characData = Rest::restGet('Charac', $data['id'], 'fk_life');
        
        //Life
        $data['superficial_total'] = Rest::$rests['LifeMagic']->getLifePointTotal($data['id']) * 2;
        $data['light_total'] = (($data['superficial_total'] - 1) < 1) ? 1 : $data['superficial_total'] - 1;
        $data['intermediate_total'] = (($data['superficial_total'] - 2) < 1) ? 1 : $data['superficial_total'] - 2;
        $data['serious_total'] = (($data['superficial_total'] - 3) < 1) ? 1 : $data['superficial_total'] - 3;
        
        $data['death_total'] = 1;
        if (floor($characData['end_total'] / 10) == 10) {
            $data['death_total'] = 4;
        } elseif (floor($characData['end_total'] / 10) >= 8) {
            $data['death_total'] = 3;
        } elseif (floor($characData['end_total'] / 10) >= 5) {
            $data['death_total'] = 2;
        }
        
        return $data;
    }
}