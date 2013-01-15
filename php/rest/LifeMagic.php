<?php

class LifeMagic extends RestProvider
{
    public function isHandler($url)
    {
        return $url === 'life_magic';
    }
    
    public function getDBTableName()
    {
        return 'jdr_life_magic';
    }
    
    public function getDBAllowedKeys()
    {
        return array(
            'life_point_bonus', 'regen_bonus', 'magic_point_bonus', 'regen_m_bonus', 'resist_bonus'
        );
    }

    public function getLabels()
    {
        return array(
            'base' => App::t('base'),
            'bonus' => App::t('bonus'),
            'aug' => App::t('aug'),
            'total' => App::t('total'),
            'life_point' => App::t('points de vie'),
            'life_point_regen' => App::t('points de vie (Regen)'),
            'magic_point' => App::t('mana'),
            'magic_point_regen' => App::t('mana (Regen)'),
            'resist' => App::t('réduction dégâts')
        );
    }

    public function getData($data)
    {
        $characData = Rest::restGet('Charac', $data['id'], 'fk_life_magic');
        
        //Life
        $data['life_point_base'] = floor($characData['end_total'] / 10);
        $data['life_point_total'] = $data['life_point_base'] + $data['life_point_bonus'];
        //Short regen
        $data['regen_short'] = floor($data['life_point_total'] / 2);
        $data['regen_short_total'] = $data['regen_short'] + $data['regen_bonus'];
        //Long regen
        $data['regen_long'] = floor($data['life_point_total'] * 2.5 / 1.5);
        $data['regen_long_total'] = $data['regen_long'] + $data['regen_bonus'];
        //Short regen "good condition"
        $data['regen_full_short'] = $data['life_point_total'];
        $data['regen_full_short_total'] = $data['regen_full_short'] + $data['regen_bonus'] * 2;
        //Long regen "good condition"
        $data['regen_full_long'] = floor($data['life_point_total'] * 2.5);
        $data['regen_full_long_total'] = $data['regen_full_long'] + $data['regen_bonus'] * 2;

        //Magic
        $data['magic_point_base'] = round($characData['spi_total'] * 2);
        $data['magic_point_total'] = $data['magic_point_base'] + $data['magic_point_bonus'];
        //Short regen
        $data['regen_m_short'] = floor($characData['spi_total'] / 8);
        $data['regen_m_short_total'] = $data['regen_m_short'] + $data['regen_m_bonus'];
        //Long regen
        $data['regen_m_long'] = floor($characData['spi_total'] / 2);
        $data['regen_m_long_total'] = $data['regen_m_long'] + $data['regen_m_bonus'];
        //Short regen "good condition"
        $data['regen_m_full_short'] = floor($characData['spi_total'] / 4);
        $data['regen_m_full_short_total'] = $data['regen_m_full_short'] + $data['regen_m_bonus'] * 2;
        //Long regen "good condition"
        $data['regen_m_full_long'] = $characData['spi_total'];
        $data['regen_m_full_long_total'] = $data['regen_m_full_long'] + $data['regen_m_bonus'] * 2;

        //Resist
        $data['resist_base'] = floor($characData['end_total'] / 10);
        $data['resist_total'] = $data['resist_base'] + $data['resist_bonus'];
        
        return $data;
    }
    
    public function getLifePointTotal($id)
    {
        $characData = Rest::restGet('Charac', $id, 'fk_life_magic');
        $data = Database::handleRequest($this->getDBTableName(), $id, $this->keyName, $this->getDBAllowedKeys());
        
        return floor($characData['end_total'] / 10) + $data['life_point_bonus'];
    }
}