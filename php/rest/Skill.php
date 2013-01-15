<?php

class Skill extends RestProvider
{
    private $characData;
    private $playerLife;
    
    public function isHandler($url)
    {
        return $url === 'skill';
    }

    public function getDBTableName()
    {
        return 'jdr_skill';
    }

    public function getDBAllowedKeys()
    {
        return array(
            //Fight Path
            'onehand_weapon_bonus', 'onehand_weapon_aug', 'onehand_weapon_spec', 'onehand_weapon_miss', 'onehand_weapon_jet',
            'twohand_weapon_bonus', 'twohand_weapon_aug', 'twohand_weapon_spec', 'twohand_weapon_miss', 'twohand_weapon_jet',
            'ranged_weapon_bonus', 'ranged_weapon_aug', 'ranged_weapon_spec', 'ranged_weapon_miss', 'ranged_weapon_jet',
            'artillery_bonus', 'artillery_aug', 'artillery_spec', 'artillery_miss', 'artillery_jet',
            'shield_bonus', 'shield_aug', 'shield_spec', 'shield_miss', 'shield_jet',
            'mano_bonus', 'mano_aug', 'mano_spec', 'mano_miss', 'mano_jet',
 
            //Body Path
            'acrobatic_bonus', 'acrobatic_aug', 'acrobatic_spec', 'acrobatic_miss', 'acrobatic_jet',
            'ambidexterity_bonus', 'ambidexterity_aug', 'ambidexterity_spec', 'ambidexterity_miss', 'ambidexterity_jet',
            'drive_bonus', 'drive_aug', 'drive_spec', 'drive_miss', 'drive_jet',
            'dodge_bonus', 'dodge_aug', 'dodge_spec', 'dodge_miss', 'dodge_jet',
            'mental_dodge_bonus', 'mental_dodge_aug', 'mental_dodge_spec', 'mental_dodge_miss', 'mental_dodge_jet',
            'run_bonus', 'run_aug', 'run_spec', 'run_miss', 'run_jet',
            'flexibility_bonus', 'flexibility_aug', 'flexibility_spec', 'flexibility_miss', 'flexibility_jet',
            
            //Sport Path
            'athletic_bonus', 'athletic_aug', 'athletic_spec', 'athletic_miss', 'athletic_jet',
            'mount_bonus', 'mount_aug', 'mount_spec', 'mount_miss', 'mount_jet',
            'swim_bonus', 'swim_aug', 'swim_spec', 'swim_miss', 'swim_jet',
            'resist_poison_bonus', 'resist_poison_aug', 'resist_poison_spec', 'resist_poison_miss', 'resist_poison_jet',
            'resist_elec_bonus', 'resist_elec_aug', 'resist_elec_spec', 'resist_elec_miss', 'resist_elec_jet',
            'resist_fire_bonus', 'resist_fire_aug', 'resist_fire_spec', 'resist_fire_miss', 'resist_fire_jet',
            'resist_cold_bonus', 'resist_cold_aug', 'resist_cold_spec', 'resist_cold_miss', 'resist_cold_jet',
            'resist_magic_bonus', 'resist_magic_aug', 'resist_magic_spec', 'resist_magic_miss', 'resist_magic_jet',
            'jump_bonus', 'jump_aug', 'jump_spec', 'jump_miss', 'jump_jet',
            'fly_bonus', 'fly_aug', 'fly_spec', 'fly_miss', 'fly_jet',
            
            //Magic Path
            'arcane_bonus', 'arcane_aug', 'arcane_spec', 'arcane_miss', 'arcane_jet',
            'dez_bonus', 'dez_aug', 'dez_spec', 'dez_miss', 'dez_jet',
            'manage_spell_bonus', 'manage_spell_aug', 'manage_spell_spec', 'manage_spell_miss', 'manage_spell_jet',
            'medit_bonus', 'medit_aug', 'medit_spec', 'medit_miss', 'medit_jet',
            'manage_mana_bonus', 'manage_mana_aug', 'manage_mana_spec', 'manage_mana_miss', 'manage_mana_jet',
            'rune_bonus', 'rune_aug', 'rune_spec', 'rune_miss', 'rune_jet',
            'rituel_bonus', 'rituel_aug', 'rituel_spec', 'rituel_miss', 'rituel_jet',
            'night_vision_bonus', 'night_vision_aug', 'night_vision_spec', 'night_vision_miss', 'night_vision_jet',
            
            //Nature Path
            'sens_bonus', 'sens_aug', 'sens_spec', 'sens_miss', 'sens_jet',
            'dressage_bonus', 'dressage_aug', 'dressage_spec', 'dressage_miss', 'dressage_jet',
            'empathie_bonus', 'empathie_aug', 'empathie_spec', 'empathie_miss', 'empathie_jet',
            'orientation_bonus', 'orientation_aug', 'orientation_spec', 'orientation_miss', 'orientation_jet',
            'psy_bonus', 'psy_aug', 'psy_spec', 'psy_miss', 'psy_jet',
            'heal_bonus', 'heal_aug', 'heal_spec', 'heal_miss', 'heal_jet',
            'survive_bonus', 'survive_aug', 'survive_spec', 'survive_miss', 'survive_jet',
            'vigilant_bonus', 'vigilant_aug', 'vigilant_spec', 'vigilant_miss', 'vigilant_jet',
            
            //Art Path
            'alchimic_bonus', 'alchimic_aug', 'alchimic_spec', 'alchimic_miss', 'alchimic_jet',
            'arti_wood_bonus', 'arti_wood_aug', 'arti_wood_spec', 'arti_wood_miss', 'arti_wood_jet',
            'arti_skin_bonus', 'arti_skin_aug', 'arti_skin_spec', 'arti_skin_miss', 'arti_skin_jet',
            'arti_metal_bonus', 'arti_metal_aug', 'arti_metal_spec', 'arti_metal_miss', 'arti_metal_jet',
            'arti_cloth_bonus', 'arti_cloth_aug', 'arti_cloth_spec', 'arti_cloth_miss', 'arti_cloth_jet',
            'picking_bonus', 'picking_aug', 'picking_spec', 'picking_miss', 'picking_jet',
            'draw_bonus', 'draw_aug', 'draw_spec', 'draw_miss', 'draw_jet',
            'discretion_bonus', 'discretion_aug', 'discretion_spec', 'discretion_miss', 'discretion_jet',
            'hide_bonus', 'hide_aug', 'hide_spec', 'hide_miss', 'hide_jet',
            'trap_bonus', 'trap_aug', 'trap_spec', 'trap_miss', 'trap_jet',
            'track_bonus', 'track_aug', 'track_spec', 'track_miss', 'track_jet',
            'theft_bonus', 'theft_aug', 'theft_spec', 'theft_miss', 'theft_jet',
            
            //Social Path
            'spiel_bonus', 'spiel_aug', 'spiel_spec', 'spiel_miss', 'spiel_jet',
            'trade_bonus', 'trade_aug', 'trade_spec', 'trade_miss', 'trade_jet',
            'diplomacy_bonus', 'diplomacy_aug', 'diplomacy_spec', 'diplomacy_miss', 'diplomacy_jet',
            'intimidation_bonus', 'intimidation_aug', 'intimidation_spec', 'intimidation_miss', 'intimidation_jet',
            'read_on_lips_bonus', 'read_on_lips_aug', 'read_on_lips_spec', 'read_on_lips_miss', 'read_on_lips_jet',
            'politic_bonus', 'politic_aug', 'politic_spec', 'politic_miss', 'politic_jet',
            'psychology_bonus', 'psychology_aug', 'psychology_spec', 'psychology_miss', 'psychology_jet',
            'seduction_bonus', 'seduction_aug', 'seduction_spec', 'seduction_miss', 'seduction_jet',
            'transformism_bonus', 'transformism_aug', 'transformism_spec', 'transformism_miss', 'transformism_jet',
            
            //Academic Path
            'cook_bonus', 'cook_aug', 'cook_spec', 'cook_miss', 'cook_jet',
            'teach_bonus', 'teach_aug', 'teach_spec', 'teach_miss', 'teach_jet',
            'geography_bonus', 'geography_aug', 'geography_spec', 'geography_miss', 'geography_jet',
            'voice_bonus', 'voice_aug', 'voice_spec', 'voice_miss', 'voice_jet',
            'stewardship_bonus', 'stewardship_aug', 'stewardship_spec', 'stewardship_miss', 'stewardship_jet',
            'engine_bonus', 'engine_aug', 'engine_spec', 'engine_miss', 'engine_jet',
            'strategy_bonus', 'strategy_aug', 'strategy_spec', 'strategy_miss', 'strategy_jet',
        );
    }
    
    public function getSkills() 
    {
        return array(
            'fight' => array(
                'charac' => 'pow',
                'skills' => array(
                    'onehand_weapon:agi', 'twohand_weapon:end', 'ranged_weapon:spe', 'artillery:int', 'shield:end', 'mano:end'
                )
            ),
            'body' => array(
                'charac' => 'spe',
                'skills' => array(
                    'acrobatic:pow', 'ambidexterity:agi', 'drive:inf', 'run:end', 'dodge:agi', 'mental_dodge:spi', 'flexibility:agi'
                )
            ),
            'athlete' => array(
                'charac' => 'end',
                'skills' => array(
                    'athletic:pow', 'mount:agi', 'swim:pow', 'resist_poison:mag', 'resist_elec:spe', 'resist_fire:pow', 'resist_cold:agi', 'resist_magic:spi', 'jump:pow', 'fly:mag'
                )
            ),
            'magic' => array(
                'charac' => 'mag',
                'skills' => array(
                    'arcane:int', 'dez:agi', 'manage_spell:agi', 'medit:inf', 'manage_mana:spi', 'rune:int', 'rituel:spi', 'night_vision:spi'
                )
            ),
            'nature' => array(
                'charac' => 'spi',
                'skills' => array(
                    'sens:inf', 'dressage:inf', 'empathie:int', 'orientation:int', 'psy:inf', 'heal:int', 'survive:end', 'vigilant:spe'
                )
            ),
            'academic' => array(
                'charac' => 'int',
                'skills' => array(
                    'cook:spi', 'teach:int', 'geography:end', 'voice:pow', 'stewardship:inf', 'engine:mag', 'strategy:spe'
                )
            ),
            'art' => array(
                'charac' => 'agi',
                'skills' => array(
                    'alchimic:int', 'arti_wood:spi', 'arti_skin:int', 'arti_metal:pow', 'arti_cloth:mag', 'picking:int', 'draw:mag', 'discretion:spi', 'hide:spe', 'trap:int', 'track:inf', 'theft:spe'
                )
            ),
            'social' => array(
                'charac' => 'inf',
                'skills' => array(
                    'spiel:spe', 'trade:spi', 'diplomacy:int', 'intimidation:pow', 'read_on_lips:int', 'politic:int', 'psychology:mag', 'seduction:agi', 'transformism:int'
                )
            )
        );
    }

    public function getLabels()
    {
        return array(
            'knowledge' => App::t('connaissance'),
            'spec' => App::t('spé.'),
            'name' => App::t('nom'),
            'charac' => App::t('carac'),
            'base' => App::t('base'),
            'bonus' => App::t('bonus'),
            'aug' => App::t('aug'),
            'miss' => App::t('raté'),
            'total' => App::t('total'),
            'jet' => App::t('jet'),
            
            //Characs 
            'pow' => App::t('puissance'),
            'agi' => App::t('agilité'),
            'spe' => App::t('rapidité'),
            'end' => App::t('endurance'),
            'spi' => App::t('esprit'),
            'mag' => App::t('magie'),
            'int' => App::t('intelligence'),
            'inf' => App::t('influence'),
                //Short
            'pow_short' => App::t('pui'),
            'agi_short' => App::t('agi'),
            'spe_short' => App::t('rap'),
            'end_short' => App::t('end'),
            'spi_short' => App::t('esp'),
            'mag_short' => App::t('mag'),
            'int_short' => App::t('int'),
            'inf_short' => App::t('inf'),
            
            //Fight Path
            'fight' => App::t('combat'),
            'onehand_weapon' => App::t('Arme à 1 main'),
            'twohand_weapon' => App::t('Arme à 2 mains'),
            'ranged_weapon' => App::t('Arme à distance'),
            'artillery' => App::t('Artillerie'),
            'shield' => App::t('Bouclier'),
            'mano' => App::t('Combat au c à c'),

            //Body Path
            'body' => App::t('corps'),
            'acrobatic' => App::t('Acrobatie'),
            'ambidexterity' => App::t('Ambidextrie'),
            'drive' => App::t('Conduite'),
            'run' => App::t('Course'),
            'dodge' => App::t('Esquive'),
            'mental_dodge' => App::t('Esquive mentale'), 
            'flexibility' => App::t('Souplesse'),
            
            //Sport Path
            'athlete' => App::t('Athlète'),
            'athletic' => App::t('Athlètisme'),
            'mount' => App::t('Monte'),
            'swim' => App::t('natation'),
            'resist_poison' => App::t('Résist. Acide/Poison'),
            'resist_elec' => App::t('Résist. Electricité'),
            'resist_fire' => App::t('Résist. Feu'),
            'resist_cold' => App::t('Résist. Froid'),
            'resist_magic' => App::t('Résist. Magie'),
            'jump' => App::t('saut'),
            'fly' => App::t('vol'),
            
            //Magic Path
            'magic' => App::t('Magie'),
            'arcane' => App::t('Arcane'),
            'dez' => App::t('Enchantement'),
            'manage_spell' => App::t('Direction de sort'),
            'medit' => App::t('Méditation'),
            'manage_mana' => App::t('Focalisation'),
            'rune' => App::t('Runes'),
            'rituel' => App::t('Rituel'),
            'night_vision' => App::t('Vision nocturne'),
            
            //Nature Path
            'nature' => App::t('Nature'),
            'sens' => App::t('6ème sens'),
            'dressage' => App::t('dressage'),
            'empathie' => App::t('empathie'),
            'orientation' => App::t('orientation'),
            'psy' => App::t('Psy'),
            'heal' => App::t('soins'),
            'survive' => App::t('survie'),
            'vigilant' => App::t('Vigilance'),
            
            //Art Path
            'art' => App::t('Art'),
            'alchimic' => App::t('Alchimie'),
            'arti_wood' => App::t('Artisanat bois'),
            'arti_skin' => App::t('Artisanat cuir'),
            'arti_metal' => App::t('Artisanat métal'),
            'arti_cloth' => App::t('Artisanat tissu'),
            'picking' => App::t('Crochetage'),
            'draw' => App::t('Dessin'),
            'discretion' => App::t('Discrétion'),
            'hide' => App::t('Dissimulation'),
            'trap' => App::t('Piège'),
            'track' => App::t('Pistage'),
            'theft' => App::t('Vol à la tire'),
            
            //Social Path
            'social' => App::t('Social'),
            'spiel' => App::t('Baratin'),
            'trade' => App::t('Commerce'),
            'diplomacy' => App::t('Diplomatie'),
            'intimidation' => App::t('Intimidation'),
            'read_on_lips' => App::t('Lect. sur lèvres'),
            'politic' => App::t('Politique'),
            'psychology' => App::t('Psychologie'),
            'seduction' => App::t('Séduction'),
            'transformism' => App::t('Transformisme'),
            
            //Academic Path
            'academic' => App::t('Académique'),
            'cook' => App::t('Cuisine'),
            'teach' => App::t('Enseignement'),
            'geography' => App::t('Géographie'),
            'voice' => App::t('Imitation/Voix'),
            'stewardship' => App::t('Intendance'),
            'engine' => App::t('Ingénierie'),
            'strategy' => App::t('Stratégie'),
            
            'set_unset_edit' => App::t('Afficher/Cacher le mode édition','F')
        );
    }
    
    public function handle($key)
    {
        $playerData = Rest::restGet('PlayerInfos', $key, 'fk_skill');
        $currentData = $this->get($key);
        $missChangedByAug = array();
        foreach($this->getDBAllowedKeys() as $skill) {
            if (strpos($skill, 'aug') !== false) {
                if ($currentData[$skill] != Rest::$data[$skill]) {
                    $skillJet = str_replace('aug','jet',$skill);
                    $skillMiss = str_replace('aug','miss',$skill);
                    Rest::$data[$skillJet] = 0;
                    Rest::$data[$skillMiss] = 0;
                    $missChangedByAug[] = $skillMiss;
                }
            }
            if (strpos($skill, 'miss') !== false && !in_array($skill, $missChangedByAug)) {
                if ($currentData[$skill] != Rest::$data[$skill]) {
                    Database::handleRequest(
                        Rest::$rests['PlayerInfos']->getDBTableName(), 
                        $key, 
                        $this->keyName, 
                        array('aug_lost'), 
                        array('id' => $key, 'aug_lost' => $playerData['aug_lost'] + (Rest::$data[$skill] - $currentData[$skill]))
                    );
                }
            }
        }
        
        
        $data = Database::handleRequest($this->getDBTableName(), $key, $this->keyName, $this->getDBAllowedKeys(), Rest::$data);
        $data = array_merge($this->getData($data), $this->getLabels());
        
        Rest::send($data);
    }
    
    public function getData($data)
    {
        $this->characData = Rest::restGet('Charac', $data['id'], 'fk_skill');
        $this->playerLife = Rest::restGet('Life', $data['id'], 'fk_skill');
        $playerData = Rest::restGet('PlayerInfos', $data['id'], 'fk_skill');

        $skills = $this->getSkills();
        
        $countSpec = 0;
        $this->genSkillsAndKnowledge($data, $countSpec, $skills, 'fight', (mb_strtolower($playerData['path']) === 'combats'));
        $this->genSkillsAndKnowledge($data, $countSpec, $skills, 'body', (mb_strtolower($playerData['path']) === 'corps'));
        $this->genSkillsAndKnowledge($data, $countSpec, $skills, 'athlete', (mb_strtolower($playerData['path']) === 'athlète'));
        $this->genSkillsAndKnowledge($data, $countSpec, $skills, 'magic', (mb_strtolower($playerData['path']) === 'magie'));
        $this->genSkillsAndKnowledge($data, $countSpec, $skills, 'nature', (mb_strtolower($playerData['path']) === 'nature'));
        $this->genSkillsAndKnowledge($data, $countSpec, $skills, 'art', (mb_strtolower($playerData['path']) === 'art'));
        $this->genSkillsAndKnowledge($data, $countSpec, $skills, 'social', (mb_strtolower($playerData['path']) === 'social'));
        $this->genSkillsAndKnowledge($data, $countSpec, $skills, 'academic', (mb_strtolower($playerData['path']) === 'académique'));

        $countSpec += Rest::$rests['Spell']->countSpec($data['id']);
        
        $data['show_unchecked_spec'] = true;
        if ($countSpec == floor($this->characData['int_total'] / 10)) {
            $data['show_unchecked_spec'] = false;
        }

        return $data;
    }
    
    public function countAug($id)
    {
        $data = Database::handleRequest($this->getDBTableName(), $id, $this->keyName, $this->getDBAllowedKeys());
        
        $countAug = 0;
        $skills = $this->getSkills();
        foreach($skills as $skill_list) {
            foreach ($skill_list['skills'] as $skill) {
                $countAug += $data[strstr($skill, ':', true).'_aug'];
            }
        }
         
        return $countAug;
    }
    
    public function countSpec($id)
    {
        $data = Database::handleRequest($this->getDBTableName(), $id, $this->keyName, $this->getDBAllowedKeys());
        $skills = $this->getSkills();
        $paths = array('fight','body','athlete','magic','nature','art','social','academic');
        
        $count = 0;
        
        foreach($paths as $path) {
            foreach($skills[$path]['skills'] as $skill) {
                $skillInfos = explode(':', $skill);
                $skillName = $skillInfos[0];

                if ($data[$skillName.'_spec'])
                    $count++;
            }
        }
        
        return $count;
    }
    
    private function genSkillsAndKnowledge(&$data, &$countSpec, $skills, $path, $isPath)
    {
        $data[$path.'_knowledge'] = 0;
        foreach($skills[$path]['skills'] as $skill) {
            $skillInfos = explode(':', $skill);
            $skillName = $skillInfos[0];
            $skillCharac = $skillInfos[1];
                
            if ($data[$skillName.'_spec']) {
                $countSpec++;
            }
            
            $this->genSkill($data, $skillName, $skills[$path]['charac'].'_total', $skillCharac.'_total', $isPath);
            $data[$path.'_knowledge'] += $data[$skillName.'_total'];
        }
        $data[$path.'_knowledge'] = floor($data[$path.'_knowledge'] / (sizeof($skills[$path]['skills']) - 1));
    }
    
    private function genSkill(&$data, $skill, $mainCharac, $secondCharac, $isFigthPath) 
    {
        $fightPathBonus = ($isFigthPath) ? 5 : 0;
        
        $data[$skill.'_base'] = floor(($this->characData[$mainCharac] * 2 + $this->characData[$secondCharac]) / 8) + $fightPathBonus;
        $data[$skill.'_max'] = floor(($this->characData[$mainCharac] * 2 + $this->characData[$secondCharac]) / 2) + $data[$skill.'_bonus'];
        $data[$skill.'_total'] = $this->getTotal($data[$skill.'_base'], $data[$skill.'_bonus'], $data[$skill.'_aug'], $data[$skill.'_spec']);
        $data[$skill.'_success_perc'] = $this->getSuccessPercent($data[$skill.'_total'] - $data[$skill.'_bonus'], $data[$skill.'_miss'], $isFigthPath);
    }

    private function getTotal($base, $bonus, $aug, $isSpec)
    {
        $total = $base + $bonus;
        if ($isSpec == 1) {
            $total += $aug * 3;
        } else {
            $total += $aug * 2;
        }
        
        if (($total - $this->getLifeMalus()) < 1) {
            $total = 1;
        } else {
            $total = $total - $this->getLifeMalus();
        }
        
        if ($total < 10) {
            $total = '0'.$total;
        }
        
        return $total;
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
    
    private function getLifeMalus() {
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