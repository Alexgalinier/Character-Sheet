<?php

class Fight extends RestProvider
{
    public function isHandler($url)
    {
        return $url === 'fight';
    }
    
    public function getDBTableName()
    {
        return 'jdr_fight';
    }
    
    public function getDBAllowedKeys()
    {
        return array(
            'weapon_dmg_bonus', 'weapon_crit_bonus', 'spell_dmg_bonus', 'spell_crit_bonus',
            'action_bonus', 'init_bonus', 'mvt_bonus', 'fight_misc'
        );
    }

    public function getLabels()
    {
        return array(
            'base' => App::t('base'),
            'bonus' => App::t('bonus'),
            'total' => App::t('total'),
            'weapon_dmg' => App::t('d. armes'),
            'weapon_crit' => App::t('crit. armes'),
            'spell_dmg' => App::t('d. sorts'),
            'spell_crit' => App::t('crit. sorts'),
            'action' => App::t('actions'),
            'init' => App::t('initiative'),
            'mvt' => App::t('mvt')
        );
    }
    
    public function getData($data)
    {
        $characData = Rest::restGet('Charac', $data['id'], 'fk_fight');
        $playerData = Rest::restGet('PlayerInfos', $data['id'], 'fk_skill');
        
        //Weapon damage
        $data['weapon_dmg_base'] = floor($characData['pow_total'] / 5);
        $data['weapon_dmg_total'] = $data['weapon_dmg_base'] + $data['weapon_dmg_bonus'];
        //Weapon critik
        $data['weapon_crit_base'] = floor($characData['agi_total'] / 5);
        $data['weapon_crit_total'] = $data['weapon_crit_base'] + $data['weapon_crit_bonus'];
        if ($data['weapon_crit_total'] < 10) {
            $data['weapon_crit_total'] = '0'.$data['weapon_crit_total'];
        }
        //Spell damage
        $data['spell_dmg_base'] = floor($characData['spi_total'] / 5);
        $data['spell_dmg_total'] = $data['spell_dmg_base'] + $data['spell_dmg_bonus'];
        //Spell critik
        $data['spell_crit_base'] = floor($characData['mag_total'] / 5);
        $data['spell_crit_total'] = $data['spell_crit_base'] + $data['spell_crit_bonus'];
        if ($data['spell_crit_total'] < 10) {
            $data['spell_crit_total'] = '0'.$data['spell_crit_total'];
        }
        //Action
        $data['action_base'] = round($characData['spe_total'] / 20);
        $data['action_total'] = $data['action_base'] + $data['action_bonus'];
        //Initiative
        $data['init_base'] = floor(($characData['spe_total'] + $characData['mag_total']) / 2);
        $data['init_total'] = $data['init_base'] + $data['init_bonus'];
        //Mouvement
        $data['mvt_base'] = $this->getMvtBase($data['id']);
        $data['mvt_total'] = $data['mvt_base'] + $data['mvt_bonus'];
        
        return $data;
    }
    
    public function getMvtBase($id) 
    {
        $playerData = Rest::restGet('PlayerInfos', $id, 'fk_skill');
        switch(mb_strtolower($playerData['race'])) {
            case 'humain': $mvt = 5; break;
            case 'nain': $mvt = 5; break;
            case 'elfe': $mvt = 6; break;
            case 'génasi': $mvt = 5; break;
            case 'semi-orque': $mvt = 6; break;
            case 'halfling': $mvt = 4; break;
            case 'tiefling': $mvt = 5; break;
        }
                    
        return $mvt;
    }
}