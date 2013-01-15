<?php

class Charac extends RestProvider
{
    public function isHandler($url)
    {
        return $url === 'charac';
    }
    
    public function getDBTableName()
    {
        return 'jdr_charac';
    }
    
    public function getDBAllowedKeys()
    {
        return array(
            'pow_base', 'pow_bonus', 'pow_aug', 'pow_miss', 'agi_base', 'agi_bonus', 'agi_aug', 'agi_miss',
            'spe_base', 'spe_bonus', 'spe_aug', 'spe_miss', 'end_base', 'end_bonus', 'end_aug', 'end_miss',
            'spi_base', 'spi_bonus', 'spi_aug', 'spi_miss', 'mag_base', 'mag_bonus', 'mag_aug', 'mag_miss',
            'int_base', 'int_bonus', 'int_aug', 'int_miss', 'inf_base', 'inf_bonus', 'inf_aug', 'inf_miss',
            'destiny_bonus', 'power_point_bonus'
        );
    }

    public function getLabels()
    {
        return array(
            'base' => App::t('base'),
            'bonus' => App::t('bonus'),
            'aug' => App::t('aug'),
            'miss' => App::t('raté'),
            'total' => App::t('total'),
            'pow_name' => App::t('puissance'),
            'agi_name' => App::t('agilité'),
            'spe_name' => App::t('rapidité'),
            'end_name' => App::t('endurance'),
            'spi_name' => App::t('esprit'),
            'mag_name' => App::t('magie'),
            'int_name' => App::t('intelligence'),
            'inf_name' => App::t('influence'),
            'destiny' => App::t('p. destin'),
            'power_point' => App::t('p. pouvoir'),
            'spell_lvl_max' => App::t('niveau max de sort'),
            'spec_current_max' => App::t('spécialisations')
        );
    }
    
    public function getData($data)
    {
        $playerData = Rest::restGet('PlayerInfos', $data['id'], 'fk_skill');
        
        //Charac
            //Total
        $data['pow_total'] = $data['pow_base'] + $data['pow_bonus'] + $data['pow_aug'];
        $data['agi_total'] = $data['agi_base'] + $data['agi_bonus'] + $data['agi_aug'];
        $data['spe_total'] = $data['spe_base'] + $data['spe_bonus'] + $data['spe_aug'];
        $data['end_total'] = $data['end_base'] + $data['end_bonus'] + $data['end_aug'];
        $data['mag_total'] = $data['mag_base'] + $data['mag_bonus'] + $data['mag_aug'];
        $data['spi_total'] = $data['spi_base'] + $data['spi_bonus'] + $data['spi_aug'];
        $data['int_total'] = $data['int_base'] + $data['int_bonus'] + $data['int_aug'];
        $data['inf_total'] = $data['inf_base'] + $data['inf_bonus'] + $data['inf_aug'];
            //Success percent
        $data['pow_success_perc'] = $this->getSuccessPercent($data['pow_total'] - $data['pow_bonus'], $data['pow_miss'], (mb_strtolower($playerData['path']) === 'combats'));
        $data['agi_success_perc'] = $this->getSuccessPercent($data['agi_total'] - $data['agi_bonus'], $data['agi_miss'], (mb_strtolower($playerData['path']) === 'art'));
        $data['spe_success_perc'] = $this->getSuccessPercent($data['spe_total'] - $data['spe_bonus'], $data['spe_miss'], (mb_strtolower($playerData['path']) === 'corps'));
        $data['end_success_perc'] = $this->getSuccessPercent($data['end_total'] - $data['end_bonus'], $data['end_miss'], (mb_strtolower($playerData['path']) === 'athlète'));
        $data['spi_success_perc'] = $this->getSuccessPercent($data['spi_total'] - $data['spi_bonus'], $data['spi_miss'], (mb_strtolower($playerData['path']) === 'nature'));
        $data['mag_success_perc'] = $this->getSuccessPercent($data['mag_total'] - $data['mag_bonus'], $data['mag_miss'], (mb_strtolower($playerData['path']) === 'magie'));
        $data['int_success_perc'] = $this->getSuccessPercent($data['int_total'] - $data['int_bonus'], $data['int_miss'], (mb_strtolower($playerData['path']) === 'académique'));
        $data['inf_success_perc'] = $this->getSuccessPercent($data['inf_total'] - $data['inf_bonus'], $data['inf_miss'], (mb_strtolower($playerData['path']) === 'social'));
        //Destiny
        $data['destiny_base'] = floor($data['inf_total'] / 12) - 1;
        $data['destiny_total'] = $data['destiny_base'] + $data['destiny_bonus'];
        //Power point
        $data['power_point_base'] = floor(($data['pow_total'] + $data['agi_total'] + $data['spe_total'] + $data['end_total'] + $data['mag_total'] + $data['spi_total'] + $data['int_total'] + $data['inf_total']) / 40);
        $data['power_point_total'] = $data['power_point_base'] + $data['power_point_bonus'];
        //Max spell lvl
        $data['max_spell_lvl'] = floor($data['mag_total'] * 6 / 90);
        //Max spec
        $data['max_spec'] = floor($data['int_total'] / 10);
        //Current spec
        $data['current_spec'] = 0;
        $data['current_spec'] += Rest::$rests['Spell']->countSpec($data['id']);
        $data['current_spec'] += Rest::$rests['Skill']->countSpec($data['id']);
        
        return $data;
    }
    
    public function handle($key)
    {
        $playerData = Rest::restGet('PlayerInfos', $key, 'fk_skill');
        $currentData = $this->get($key);
        $missChangedByAug = array();
        
        foreach(array('pow', 'agi', 'spe', 'end', 'spi', 'mag', 'int', 'inf') as $carac) {
            if ($currentData[$carac.'_aug'] != Rest::$data[$carac.'_aug']) {
                Rest::$data[$carac.'_miss'] = 0;
                $missChangedByAug[] = $carac;
            }
            if (!in_array($carac, $missChangedByAug)) {
                if ($currentData[$carac.'_miss'] != Rest::$data[$carac.'_miss']) {
                    Database::handleRequest(
                        Rest::$rests['PlayerInfos']->getDBTableName(), 
                        $key, 
                        $this->keyName, 
                        array('aug_lost'), 
                        array('id' => $key, 'aug_lost' => $playerData['aug_lost'] + (Rest::$data[$carac.'_miss'] - $currentData[$carac.'_miss']))
                    );
                }
            }
        }
        
        $data = Database::handleRequest($this->getDBTableName(), $key, $this->keyName, $this->getDBAllowedKeys(), Rest::$data);
        $data = array_merge($this->getData($data), $this->getLabels());
        
        Rest::send($data);
    }
    
    public function countAug($id)
    {
        $data = Database::handleRequest($this->getDBTableName(), $id, $this->keyName, $this->getDBAllowedKeys());
        
        return $data['pow_aug'] + $data['agi_aug'] + $data['spe_aug'] + $data['end_aug'] + $data['mag_aug'] + $data['spi_aug'] + $data['int_aug'] + $data['inf_aug']; 
    }
    
    private function getSuccessPercent($total, $missNumber, $isPath)
    {
        $percent = 100;
        if ($isPath == true) {
            if ($total >= 90) {
                $percent = 20;
            } elseif ($total >= 80) {
                $percent = 30;
            } elseif ($total >= 70) {
                $percent = 40;
            }
        } else {
            if ($total >= 90) {
                $percent = 10;
            } elseif ($total >= 80) {
                $percent = 20;
            } elseif ($total >= 70) {
                $percent = 30;
            } elseif ($total >= 60) {
                $percent = 40;
            } elseif ($total >= 50) {
                $percent = 50;
            }
        }
        
        return (($missNumber + 1) * $percent > 100) ? 100 : ($missNumber + 1) * $percent;
    }
}