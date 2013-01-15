-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 15 Janvier 2013 à 17:17
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `alexgaliddhelp`
--

-- --------------------------------------------------------

--
-- Structure de la table `jdr_armory`
--

CREATE TABLE IF NOT EXISTS `jdr_armory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hit` int(3) NOT NULL DEFAULT '0',
  `damage` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `crit` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `init` int(11) NOT NULL DEFAULT '0',
  `range` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `misc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fk_player` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `jdr_armory`
--

INSERT INTO `jdr_armory` (`id`, `name`, `hit`, `damage`, `crit`, `init`, `range`, `misc`, `fk_player`) VALUES
(1, 'test', 12, '4', 'K', 0, '', '', 1),
(2, 'azea', 0, '2', 'E', 2, '', '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `jdr_charac`
--

CREATE TABLE IF NOT EXISTS `jdr_charac` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pow_base` int(11) NOT NULL DEFAULT '0',
  `pow_bonus` int(11) NOT NULL DEFAULT '0',
  `pow_aug` int(11) NOT NULL DEFAULT '0',
  `agi_base` int(11) NOT NULL DEFAULT '0',
  `agi_bonus` int(11) NOT NULL DEFAULT '0',
  `agi_aug` int(11) NOT NULL DEFAULT '0',
  `spe_base` int(11) NOT NULL DEFAULT '0',
  `spe_bonus` int(11) NOT NULL DEFAULT '0',
  `spe_aug` int(11) NOT NULL DEFAULT '0',
  `end_base` int(11) NOT NULL DEFAULT '0',
  `end_bonus` int(11) NOT NULL DEFAULT '0',
  `end_aug` int(11) NOT NULL DEFAULT '0',
  `spi_base` int(11) NOT NULL DEFAULT '0',
  `spi_bonus` int(11) NOT NULL DEFAULT '0',
  `spi_aug` int(11) NOT NULL DEFAULT '0',
  `mag_base` int(11) NOT NULL DEFAULT '0',
  `mag_bonus` int(11) NOT NULL DEFAULT '0',
  `mag_aug` int(11) NOT NULL DEFAULT '0',
  `int_base` int(11) NOT NULL DEFAULT '0',
  `int_bonus` int(11) NOT NULL DEFAULT '0',
  `int_aug` int(11) NOT NULL DEFAULT '0',
  `inf_base` int(11) NOT NULL DEFAULT '0',
  `inf_bonus` int(11) NOT NULL DEFAULT '0',
  `inf_aug` int(11) NOT NULL DEFAULT '0',
  `destiny_bonus` int(11) NOT NULL DEFAULT '0',
  `power_point_bonus` int(11) NOT NULL DEFAULT '0',
  `pow_miss` int(11) NOT NULL DEFAULT '0',
  `agi_miss` int(11) NOT NULL DEFAULT '0',
  `spe_miss` int(11) NOT NULL DEFAULT '0',
  `end_miss` int(11) NOT NULL DEFAULT '0',
  `spi_miss` int(11) NOT NULL DEFAULT '0',
  `mag_miss` int(11) NOT NULL DEFAULT '0',
  `int_miss` int(11) NOT NULL DEFAULT '0',
  `inf_miss` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `jdr_charac`
--

INSERT INTO `jdr_charac` (`id`, `pow_base`, `pow_bonus`, `pow_aug`, `agi_base`, `agi_bonus`, `agi_aug`, `spe_base`, `spe_bonus`, `spe_aug`, `end_base`, `end_bonus`, `end_aug`, `spi_base`, `spi_bonus`, `spi_aug`, `mag_base`, `mag_bonus`, `mag_aug`, `int_base`, `int_bonus`, `int_aug`, `inf_base`, `inf_bonus`, `inf_aug`, `destiny_bonus`, `power_point_bonus`, `pow_miss`, `agi_miss`, `spe_miss`, `end_miss`, `spi_miss`, `mag_miss`, `int_miss`, `inf_miss`) VALUES
(1, 30, 10, 2, 32, 4, 4, 43, 0, 3, 30, 7, 20, 45, 0, 15, 50, 0, 1, 40, 0, 15, 50, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 35, 1, 2, 35, 0, 0, 35, 0, 0, 35, 0, 0, 35, 0, 0, 35, 0, 0, 35, 0, 0, 0, 0, 35, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 50, 0, 10, 40, 0, 0, 30, 0, 0, 35, 0, 19, 40, 0, 15, 50, 0, 10, 45, 0, 5, 30, 0, 19, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 40, 0, 0, 40, 0, 0, 40, 0, 0, 40, 0, 0, 40, 0, 0, 40, 0, 0, 40, 0, 0, 40, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `jdr_fight`
--

CREATE TABLE IF NOT EXISTS `jdr_fight` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `weapon_dmg_bonus` int(11) NOT NULL DEFAULT '0',
  `weapon_crit_bonus` int(11) NOT NULL DEFAULT '0',
  `spell_dmg_bonus` int(11) NOT NULL DEFAULT '0',
  `spell_crit_bonus` int(11) NOT NULL DEFAULT '0',
  `action_bonus` int(11) NOT NULL DEFAULT '0',
  `init_bonus` int(11) NOT NULL DEFAULT '0',
  `lvl_aug_bonus` int(11) NOT NULL DEFAULT '0',
  `mvt_bonus` int(11) NOT NULL DEFAULT '0',
  `fight_misc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `jdr_fight`
--

INSERT INTO `jdr_fight` (`id`, `weapon_dmg_bonus`, `weapon_crit_bonus`, `spell_dmg_bonus`, `spell_crit_bonus`, `action_bonus`, `init_bonus`, `lvl_aug_bonus`, `mvt_bonus`, `fight_misc`) VALUES
(1, 0, 0, 0, 0, 0, 0, 2, 0, ''),
(2, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(3, 0, 0, 0, 0, 0, 0, 0, 0, ''),
(4, 0, 0, 0, 0, 0, 0, 0, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `jdr_life`
--

CREATE TABLE IF NOT EXISTS `jdr_life` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `superficial` int(11) NOT NULL DEFAULT '0',
  `light` int(11) NOT NULL DEFAULT '0',
  `intermediate` int(11) NOT NULL DEFAULT '0',
  `serious` int(11) NOT NULL DEFAULT '0',
  `death` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `jdr_life`
--

INSERT INTO `jdr_life` (`id`, `superficial`, `light`, `intermediate`, `serious`, `death`) VALUES
(1, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `jdr_life_magic`
--

CREATE TABLE IF NOT EXISTS `jdr_life_magic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `life_point_bonus` int(11) NOT NULL DEFAULT '0',
  `regen_bonus` int(11) NOT NULL DEFAULT '0',
  `magic_point_bonus` int(11) NOT NULL DEFAULT '0',
  `regen_m_bonus` int(11) NOT NULL DEFAULT '0',
  `resist_bonus` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `jdr_life_magic`
--

INSERT INTO `jdr_life_magic` (`id`, `life_point_bonus`, `regen_bonus`, `magic_point_bonus`, `regen_m_bonus`, `resist_bonus`) VALUES
(1, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `jdr_misc`
--

CREATE TABLE IF NOT EXISTS `jdr_misc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `misc` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `jdr_misc`
--

INSERT INTO `jdr_misc` (`id`, `misc`) VALUES
(1, '[Armure machin] : elle fait plein de chose\n[Pouvoir truc] : Pour voir machin'),
(2, ''),
(3, ''),
(4, '');

-- --------------------------------------------------------

--
-- Structure de la table `jdr_player`
--

CREATE TABLE IF NOT EXISTS `jdr_player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fk_charac` int(11) NOT NULL,
  `fk_fight` int(11) NOT NULL,
  `fk_life_magic` int(11) NOT NULL,
  `fk_specific` int(11) NOT NULL,
  `fk_player_infos` int(11) NOT NULL,
  `fk_skill` int(11) NOT NULL,
  `fk_life` int(11) NOT NULL,
  `fk_spell` int(11) NOT NULL,
  `fk_misc` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `jdr_player`
--

INSERT INTO `jdr_player` (`id`, `fk_charac`, `fk_fight`, `fk_life_magic`, `fk_specific`, `fk_player_infos`, `fk_skill`, `fk_life`, `fk_spell`, `fk_misc`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 2, 2, 2, 2, 2, 2, 2, 2, 2),
(3, 3, 3, 3, 3, 3, 3, 3, 3, 3),
(4, 4, 4, 4, 4, 4, 4, 4, 4, 3);

-- --------------------------------------------------------

--
-- Structure de la table `jdr_player_infos`
--

CREATE TABLE IF NOT EXISTS `jdr_player_infos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `player_real_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `aug_total` int(11) NOT NULL DEFAULT '0',
  `aug_lost` int(11) NOT NULL DEFAULT '0',
  `race` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `jdr_player_infos`
--

INSERT INTO `jdr_player_infos` (`id`, `origin`, `name`, `player_real_name`, `aug_total`, `aug_lost`, `race`, `path`) VALUES
(1, 'DÉMONIQUE', 'Naaska', 'Thomas GALLINARI', 250, 19, 'TIEFLING', 'MAGIE'),
(2, 'ORIGINEL', 'Iko', 'Guillaume BRETON', 250, 2, 'HALFLING', 'MAGIE'),
(3, 'DIVIN', 'Nar''ayane', 'Sébastien BALARD', 250, 0, 'ELFE', 'COMBATS'),
(4, 'ORIGINEL', 'Mardokar', 'Julien CHAKRA-BREIL', 50, 0, 'HUMAIN', 'MAGIE');

-- --------------------------------------------------------

--
-- Structure de la table `jdr_skill`
--

CREATE TABLE IF NOT EXISTS `jdr_skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `onehand_weapon_bonus` int(11) NOT NULL DEFAULT '0',
  `onehand_weapon_aug` int(11) NOT NULL DEFAULT '0',
  `onehand_weapon_spec` tinyint(1) NOT NULL DEFAULT '0',
  `onehand_weapon_miss` int(11) NOT NULL DEFAULT '0',
  `twohand_weapon_bonus` int(11) NOT NULL DEFAULT '0',
  `twohand_weapon_aug` int(11) NOT NULL DEFAULT '0',
  `twohand_weapon_spec` tinyint(1) NOT NULL DEFAULT '0',
  `twohand_weapon_miss` int(11) NOT NULL DEFAULT '0',
  `ranged_weapon_bonus` int(11) NOT NULL DEFAULT '0',
  `ranged_weapon_aug` int(11) NOT NULL DEFAULT '0',
  `ranged_weapon_spec` int(11) NOT NULL DEFAULT '0',
  `ranged_weapon_miss` int(11) NOT NULL DEFAULT '0',
  `artillery_bonus` int(11) NOT NULL DEFAULT '0',
  `artillery_aug` int(11) NOT NULL DEFAULT '0',
  `artillery_spec` int(11) NOT NULL DEFAULT '0',
  `artillery_miss` int(11) NOT NULL DEFAULT '0',
  `shield_bonus` int(11) NOT NULL DEFAULT '0',
  `shield_aug` int(11) NOT NULL DEFAULT '0',
  `shield_spec` int(11) NOT NULL DEFAULT '0',
  `shield_miss` int(11) NOT NULL DEFAULT '0',
  `mano_bonus` int(11) NOT NULL DEFAULT '0',
  `mano_aug` int(11) NOT NULL DEFAULT '0',
  `mano_spec` int(11) NOT NULL DEFAULT '0',
  `mano_miss` int(11) NOT NULL DEFAULT '0',
  `acrobatic_bonus` int(11) NOT NULL DEFAULT '0',
  `acrobatic_aug` int(11) NOT NULL DEFAULT '0',
  `acrobatic_spec` int(11) NOT NULL DEFAULT '0',
  `acrobatic_miss` int(11) NOT NULL DEFAULT '0',
  `ambidexterity_bonus` int(11) NOT NULL DEFAULT '0',
  `ambidexterity_aug` int(11) NOT NULL DEFAULT '0',
  `ambidexterity_spec` int(11) NOT NULL DEFAULT '0',
  `ambidexterity_miss` int(11) NOT NULL DEFAULT '0',
  `drive_bonus` int(11) NOT NULL DEFAULT '0',
  `drive_aug` int(11) NOT NULL DEFAULT '0',
  `drive_spec` int(11) NOT NULL DEFAULT '0',
  `drive_miss` int(11) NOT NULL DEFAULT '0',
  `run_bonus` int(11) NOT NULL DEFAULT '0',
  `run_aug` int(11) NOT NULL DEFAULT '0',
  `run_spec` int(11) NOT NULL DEFAULT '0',
  `run_miss` int(11) NOT NULL DEFAULT '0',
  `dodge_bonus` int(11) NOT NULL DEFAULT '0',
  `dodge_aug` int(11) NOT NULL DEFAULT '0',
  `dodge_spec` int(11) NOT NULL DEFAULT '0',
  `dodge_miss` int(11) NOT NULL DEFAULT '0',
  `mental_dodge_bonus` int(11) NOT NULL DEFAULT '0',
  `mental_dodge_aug` int(11) NOT NULL DEFAULT '0',
  `mental_dodge_spec` int(11) NOT NULL DEFAULT '0',
  `mental_dodge_miss` int(11) NOT NULL DEFAULT '0',
  `flexibility_bonus` int(11) NOT NULL DEFAULT '0',
  `flexibility_aug` int(11) NOT NULL DEFAULT '0',
  `flexibility_spec` int(11) NOT NULL DEFAULT '0',
  `flexibility_miss` int(11) NOT NULL DEFAULT '0',
  `athletic_bonus` int(11) NOT NULL DEFAULT '0',
  `athletic_aug` int(11) NOT NULL DEFAULT '0',
  `athletic_spec` int(11) NOT NULL DEFAULT '0',
  `athletic_miss` int(11) NOT NULL DEFAULT '0',
  `mount_bonus` int(11) NOT NULL DEFAULT '0',
  `mount_aug` int(11) NOT NULL DEFAULT '0',
  `mount_spec` int(11) NOT NULL DEFAULT '0',
  `mount_miss` int(11) NOT NULL DEFAULT '0',
  `swim_bonus` int(11) NOT NULL DEFAULT '0',
  `swim_aug` int(11) NOT NULL DEFAULT '0',
  `swim_spec` int(11) NOT NULL DEFAULT '0',
  `swim_miss` int(11) NOT NULL DEFAULT '0',
  `resist_poison_bonus` int(11) NOT NULL DEFAULT '0',
  `resist_poison_aug` int(11) NOT NULL DEFAULT '0',
  `resist_poison_spec` int(11) NOT NULL DEFAULT '0',
  `resist_poison_miss` int(11) NOT NULL DEFAULT '0',
  `resist_elec_bonus` int(11) NOT NULL DEFAULT '0',
  `resist_elec_aug` int(11) NOT NULL DEFAULT '0',
  `resist_elec_spec` int(11) NOT NULL DEFAULT '0',
  `resist_elec_miss` int(11) NOT NULL DEFAULT '0',
  `resist_fire_bonus` int(11) NOT NULL DEFAULT '0',
  `resist_fire_aug` int(11) NOT NULL DEFAULT '0',
  `resist_fire_spec` int(11) NOT NULL DEFAULT '0',
  `resist_fire_miss` int(11) NOT NULL DEFAULT '0',
  `resist_cold_bonus` int(11) NOT NULL DEFAULT '0',
  `resist_cold_aug` int(11) NOT NULL DEFAULT '0',
  `resist_cold_spec` int(11) NOT NULL DEFAULT '0',
  `resist_cold_miss` int(11) NOT NULL DEFAULT '0',
  `resist_magic_bonus` int(11) NOT NULL DEFAULT '0',
  `resist_magic_aug` int(11) NOT NULL DEFAULT '0',
  `resist_magic_spec` int(11) NOT NULL DEFAULT '0',
  `resist_magic_miss` int(11) NOT NULL DEFAULT '0',
  `jump_bonus` int(11) NOT NULL DEFAULT '0',
  `jump_aug` int(11) NOT NULL DEFAULT '0',
  `jump_spec` int(11) NOT NULL DEFAULT '0',
  `jump_miss` int(11) NOT NULL DEFAULT '0',
  `fly_bonus` int(11) NOT NULL DEFAULT '0',
  `fly_aug` int(11) NOT NULL DEFAULT '0',
  `fly_spec` int(11) NOT NULL DEFAULT '0',
  `fly_miss` int(11) NOT NULL DEFAULT '0',
  `arcane_bonus` int(11) NOT NULL DEFAULT '0',
  `arcane_aug` int(11) NOT NULL DEFAULT '0',
  `arcane_spec` int(11) NOT NULL DEFAULT '0',
  `arcane_miss` int(11) NOT NULL DEFAULT '0',
  `dez_bonus` int(11) NOT NULL DEFAULT '0',
  `dez_aug` int(11) NOT NULL DEFAULT '0',
  `dez_spec` int(11) NOT NULL DEFAULT '0',
  `dez_miss` int(11) NOT NULL DEFAULT '0',
  `manage_spell_bonus` int(11) NOT NULL DEFAULT '0',
  `manage_spell_aug` int(11) NOT NULL DEFAULT '0',
  `manage_spell_spec` int(11) NOT NULL DEFAULT '0',
  `manage_spell_miss` int(11) NOT NULL DEFAULT '0',
  `medit_bonus` int(11) NOT NULL DEFAULT '0',
  `medit_aug` int(11) NOT NULL DEFAULT '0',
  `medit_spec` int(11) NOT NULL DEFAULT '0',
  `medit_miss` int(11) NOT NULL DEFAULT '0',
  `rune_bonus` int(11) NOT NULL DEFAULT '0',
  `rune_aug` int(11) NOT NULL DEFAULT '0',
  `rune_spec` int(11) NOT NULL DEFAULT '0',
  `rune_miss` int(11) NOT NULL DEFAULT '0',
  `rituel_bonus` int(11) NOT NULL DEFAULT '0',
  `rituel_aug` int(11) NOT NULL DEFAULT '0',
  `rituel_spec` int(11) NOT NULL DEFAULT '0',
  `rituel_miss` int(11) NOT NULL DEFAULT '0',
  `night_vision_bonus` int(11) NOT NULL DEFAULT '0',
  `night_vision_aug` int(11) NOT NULL DEFAULT '0',
  `night_vision_spec` int(11) NOT NULL DEFAULT '0',
  `night_vision_miss` int(11) NOT NULL DEFAULT '0',
  `sens_bonus` int(11) NOT NULL DEFAULT '0',
  `sens_aug` int(11) NOT NULL DEFAULT '0',
  `sens_spec` int(11) NOT NULL DEFAULT '0',
  `sens_miss` int(11) NOT NULL DEFAULT '0',
  `dressage_bonus` int(11) NOT NULL DEFAULT '0',
  `dressage_aug` int(11) NOT NULL DEFAULT '0',
  `dressage_spec` int(11) NOT NULL DEFAULT '0',
  `dressage_miss` int(11) NOT NULL DEFAULT '0',
  `empathie_bonus` int(11) NOT NULL DEFAULT '0',
  `empathie_aug` int(11) NOT NULL DEFAULT '0',
  `empathie_spec` int(11) NOT NULL DEFAULT '0',
  `empathie_miss` int(11) NOT NULL DEFAULT '0',
  `orientation_bonus` int(11) NOT NULL DEFAULT '0',
  `orientation_aug` int(11) NOT NULL DEFAULT '0',
  `orientation_spec` int(11) NOT NULL DEFAULT '0',
  `orientation_miss` int(11) NOT NULL DEFAULT '0',
  `heal_bonus` int(11) NOT NULL DEFAULT '0',
  `heal_aug` int(11) NOT NULL DEFAULT '0',
  `heal_spec` int(11) NOT NULL DEFAULT '0',
  `heal_miss` int(11) NOT NULL DEFAULT '0',
  `survive_bonus` int(11) NOT NULL DEFAULT '0',
  `survive_aug` int(11) NOT NULL DEFAULT '0',
  `survive_spec` int(11) NOT NULL DEFAULT '0',
  `survive_miss` int(11) NOT NULL DEFAULT '0',
  `vigilant_bonus` int(11) NOT NULL DEFAULT '0',
  `vigilant_aug` int(11) NOT NULL DEFAULT '0',
  `vigilant_spec` int(11) NOT NULL DEFAULT '0',
  `vigilant_miss` int(11) NOT NULL DEFAULT '0',
  `arti_wood_bonus` int(11) NOT NULL DEFAULT '0',
  `arti_wood_aug` int(11) NOT NULL DEFAULT '0',
  `arti_wood_spec` int(11) NOT NULL DEFAULT '0',
  `arti_wood_miss` int(11) NOT NULL DEFAULT '0',
  `arti_skin_bonus` int(11) NOT NULL DEFAULT '0',
  `arti_skin_aug` int(11) NOT NULL DEFAULT '0',
  `arti_skin_spec` int(11) NOT NULL DEFAULT '0',
  `arti_skin_miss` int(11) NOT NULL DEFAULT '0',
  `arti_metal_bonus` int(11) NOT NULL DEFAULT '0',
  `arti_metal_aug` int(11) NOT NULL DEFAULT '0',
  `arti_metal_spec` int(11) NOT NULL DEFAULT '0',
  `arti_metal_miss` int(11) NOT NULL DEFAULT '0',
  `arti_cloth_bonus` int(11) NOT NULL DEFAULT '0',
  `arti_cloth_aug` int(11) NOT NULL DEFAULT '0',
  `arti_cloth_spec` int(11) NOT NULL DEFAULT '0',
  `arti_cloth_miss` int(11) NOT NULL DEFAULT '0',
  `picking_bonus` int(11) NOT NULL DEFAULT '0',
  `picking_aug` int(11) NOT NULL DEFAULT '0',
  `picking_spec` int(11) NOT NULL DEFAULT '0',
  `picking_miss` int(11) NOT NULL DEFAULT '0',
  `draw_bonus` int(11) NOT NULL DEFAULT '0',
  `draw_aug` int(11) NOT NULL DEFAULT '0',
  `draw_spec` int(11) NOT NULL DEFAULT '0',
  `draw_miss` int(11) NOT NULL DEFAULT '0',
  `discretion_bonus` int(11) NOT NULL DEFAULT '0',
  `discretion_aug` int(11) NOT NULL DEFAULT '0',
  `discretion_spec` int(11) NOT NULL DEFAULT '0',
  `discretion_miss` int(11) NOT NULL DEFAULT '0',
  `hide_bonus` int(11) NOT NULL DEFAULT '0',
  `hide_aug` int(11) NOT NULL DEFAULT '0',
  `hide_spec` int(11) NOT NULL DEFAULT '0',
  `hide_miss` int(11) NOT NULL DEFAULT '0',
  `trap_bonus` int(11) NOT NULL DEFAULT '0',
  `trap_aug` int(11) NOT NULL DEFAULT '0',
  `trap_spec` int(11) NOT NULL DEFAULT '0',
  `trap_miss` int(11) NOT NULL DEFAULT '0',
  `track_bonus` int(11) NOT NULL DEFAULT '0',
  `track_aug` int(11) NOT NULL DEFAULT '0',
  `track_spec` int(11) NOT NULL DEFAULT '0',
  `track_miss` int(11) NOT NULL DEFAULT '0',
  `theft_bonus` int(11) NOT NULL DEFAULT '0',
  `theft_aug` int(11) NOT NULL DEFAULT '0',
  `theft_spec` int(11) NOT NULL DEFAULT '0',
  `theft_miss` int(11) NOT NULL DEFAULT '0',
  `spiel_bonus` int(11) NOT NULL DEFAULT '0',
  `spiel_aug` int(11) NOT NULL DEFAULT '0',
  `spiel_spec` int(11) NOT NULL DEFAULT '0',
  `spiel_miss` int(11) NOT NULL DEFAULT '0',
  `trade_bonus` int(11) NOT NULL DEFAULT '0',
  `trade_aug` int(11) NOT NULL DEFAULT '0',
  `trade_spec` int(11) NOT NULL DEFAULT '0',
  `trade_miss` int(11) NOT NULL DEFAULT '0',
  `diplomacy_bonus` int(11) NOT NULL DEFAULT '0',
  `diplomacy_aug` int(11) NOT NULL DEFAULT '0',
  `diplomacy_spec` int(11) NOT NULL DEFAULT '0',
  `diplomacy_miss` int(11) NOT NULL DEFAULT '0',
  `intimidation_bonus` int(11) NOT NULL DEFAULT '0',
  `intimidation_aug` int(11) NOT NULL DEFAULT '0',
  `intimidation_spec` int(11) NOT NULL DEFAULT '0',
  `intimidation_miss` int(11) NOT NULL DEFAULT '0',
  `read_on_lips_bonus` int(11) NOT NULL DEFAULT '0',
  `read_on_lips_aug` int(11) NOT NULL DEFAULT '0',
  `read_on_lips_spec` int(11) NOT NULL DEFAULT '0',
  `read_on_lips_miss` int(11) NOT NULL DEFAULT '0',
  `politic_bonus` int(11) NOT NULL DEFAULT '0',
  `politic_aug` int(11) NOT NULL DEFAULT '0',
  `politic_spec` int(11) NOT NULL DEFAULT '0',
  `politic_miss` int(11) NOT NULL DEFAULT '0',
  `psychology_bonus` int(11) NOT NULL DEFAULT '0',
  `psychology_aug` int(11) NOT NULL DEFAULT '0',
  `psychology_spec` int(11) NOT NULL DEFAULT '0',
  `psychology_miss` int(11) NOT NULL DEFAULT '0',
  `seduction_bonus` int(11) NOT NULL DEFAULT '0',
  `seduction_aug` int(11) NOT NULL DEFAULT '0',
  `seduction_spec` int(11) NOT NULL DEFAULT '0',
  `seduction_miss` int(11) NOT NULL DEFAULT '0',
  `transformism_bonus` int(11) NOT NULL DEFAULT '0',
  `transformism_aug` int(11) NOT NULL DEFAULT '0',
  `transformism_spec` int(11) NOT NULL DEFAULT '0',
  `transformism_miss` int(11) NOT NULL DEFAULT '0',
  `cook_bonus` int(11) NOT NULL DEFAULT '0',
  `cook_aug` int(11) NOT NULL DEFAULT '0',
  `cook_spec` int(11) NOT NULL DEFAULT '0',
  `cook_miss` int(11) NOT NULL DEFAULT '0',
  `teach_bonus` int(11) NOT NULL DEFAULT '0',
  `teach_aug` int(11) NOT NULL DEFAULT '0',
  `teach_spec` int(11) NOT NULL DEFAULT '0',
  `teach_miss` int(11) NOT NULL DEFAULT '0',
  `geography_bonus` int(11) NOT NULL DEFAULT '0',
  `geography_aug` int(11) NOT NULL DEFAULT '0',
  `geography_spec` int(11) NOT NULL DEFAULT '0',
  `geography_miss` int(11) NOT NULL DEFAULT '0',
  `voice_bonus` int(11) NOT NULL DEFAULT '0',
  `voice_aug` int(11) NOT NULL DEFAULT '0',
  `voice_spec` int(11) NOT NULL DEFAULT '0',
  `voice_miss` int(11) NOT NULL DEFAULT '0',
  `stewardship_bonus` int(11) NOT NULL DEFAULT '0',
  `stewardship_aug` int(11) NOT NULL DEFAULT '0',
  `stewardship_spec` int(11) NOT NULL DEFAULT '0',
  `stewardship_miss` int(11) NOT NULL DEFAULT '0',
  `engine_bonus` int(11) NOT NULL DEFAULT '0',
  `engine_aug` int(11) NOT NULL DEFAULT '0',
  `engine_spec` int(11) NOT NULL DEFAULT '0',
  `engine_miss` int(11) NOT NULL DEFAULT '0',
  `strategy_bonus` int(11) NOT NULL DEFAULT '0',
  `strategy_aug` int(11) NOT NULL DEFAULT '0',
  `strategy_spec` int(11) NOT NULL DEFAULT '0',
  `strategy_miss` int(11) NOT NULL DEFAULT '0',
  `manage_mana_bonus` int(11) NOT NULL DEFAULT '0',
  `manage_mana_aug` int(11) NOT NULL DEFAULT '0',
  `manage_mana_spec` int(11) NOT NULL DEFAULT '0',
  `manage_mana_miss` int(11) NOT NULL DEFAULT '0',
  `alchimic_bonus` int(11) NOT NULL DEFAULT '0',
  `alchimic_aug` int(11) NOT NULL DEFAULT '0',
  `alchimic_spec` int(11) NOT NULL DEFAULT '0',
  `alchimic_miss` int(11) NOT NULL DEFAULT '0',
  `psy_bonus` int(11) NOT NULL DEFAULT '0',
  `psy_aug` int(11) NOT NULL DEFAULT '0',
  `psy_spec` int(11) NOT NULL DEFAULT '0',
  `psy_miss` int(11) NOT NULL DEFAULT '0',
  `onehand_weapon_jet` int(11) DEFAULT '0',
  `twohand_weapon_jet` int(11) DEFAULT '0',
  `ranged_weapon_jet` int(11) DEFAULT '0',
  `artillery_jet` int(11) DEFAULT '0',
  `shield_jet` int(11) DEFAULT '0',
  `mano_jet` int(11) DEFAULT '0',
  `acrobatic_jet` int(11) DEFAULT '0',
  `ambidexterity_jet` int(11) DEFAULT '0',
  `drive_jet` int(11) DEFAULT '0',
  `run_jet` int(11) DEFAULT '0',
  `dodge_jet` int(11) DEFAULT '0',
  `mental_dodge_jet` int(11) DEFAULT '0',
  `flexibility_jet` int(11) DEFAULT '0',
  `athletic_jet` int(11) DEFAULT '0',
  `mount_jet` int(11) DEFAULT '0',
  `swim_jet` int(11) DEFAULT '0',
  `resist_poison_jet` int(11) DEFAULT '0',
  `resist_elec_jet` int(11) DEFAULT '0',
  `resist_fire_jet` int(11) DEFAULT '0',
  `resist_cold_jet` int(11) DEFAULT '0',
  `resist_magic_jet` int(11) DEFAULT '0',
  `jump_jet` int(11) DEFAULT '0',
  `fly_jet` int(11) DEFAULT '0',
  `arcane_jet` int(11) DEFAULT '0',
  `dez_jet` int(11) DEFAULT '0',
  `manage_spell_jet` int(11) DEFAULT '0',
  `medit_jet` int(11) DEFAULT '0',
  `rune_jet` int(11) DEFAULT '0',
  `rituel_jet` int(11) DEFAULT '0',
  `night_vision_jet` int(11) DEFAULT '0',
  `sens_jet` int(11) DEFAULT '0',
  `dressage_jet` int(11) DEFAULT '0',
  `empathie_jet` int(11) DEFAULT '0',
  `orientation_jet` int(11) DEFAULT '0',
  `heal_jet` int(11) DEFAULT '0',
  `survive_jet` int(11) DEFAULT '0',
  `vigilant_jet` int(11) DEFAULT '0',
  `arti_wood_jet` int(11) DEFAULT '0',
  `arti_skin_jet` int(11) DEFAULT '0',
  `arti_metal_jet` int(11) DEFAULT '0',
  `arti_cloth_jet` int(11) DEFAULT '0',
  `picking_jet` int(11) DEFAULT '0',
  `draw_jet` int(11) DEFAULT '0',
  `discretion_jet` int(11) DEFAULT '0',
  `hide_jet` int(11) DEFAULT '0',
  `trap_jet` int(11) DEFAULT '0',
  `track_jet` int(11) DEFAULT '0',
  `theft_jet` int(11) DEFAULT '0',
  `spiel_jet` int(11) DEFAULT '0',
  `trade_jet` int(11) DEFAULT '0',
  `diplomacy_jet` int(11) DEFAULT '0',
  `intimidation_jet` int(11) DEFAULT '0',
  `read_on_lips_jet` int(11) DEFAULT '0',
  `politic_jet` int(11) DEFAULT '0',
  `psychology_jet` int(11) DEFAULT '0',
  `seduction_jet` int(11) DEFAULT '0',
  `transformism_jet` int(11) DEFAULT '0',
  `cook_jet` int(11) DEFAULT '0',
  `teach_jet` int(11) DEFAULT '0',
  `geography_jet` int(11) DEFAULT '0',
  `voice_jet` int(11) DEFAULT '0',
  `stewardship_jet` int(11) DEFAULT '0',
  `engine_jet` int(11) DEFAULT '0',
  `strategy_jet` int(11) DEFAULT '0',
  `manage_mana_jet` int(11) DEFAULT '0',
  `alchimic_jet` int(11) DEFAULT '0',
  `psy_jet` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `jdr_skill`
--

INSERT INTO `jdr_skill` (`id`, `onehand_weapon_bonus`, `onehand_weapon_aug`, `onehand_weapon_spec`, `onehand_weapon_miss`, `twohand_weapon_bonus`, `twohand_weapon_aug`, `twohand_weapon_spec`, `twohand_weapon_miss`, `ranged_weapon_bonus`, `ranged_weapon_aug`, `ranged_weapon_spec`, `ranged_weapon_miss`, `artillery_bonus`, `artillery_aug`, `artillery_spec`, `artillery_miss`, `shield_bonus`, `shield_aug`, `shield_spec`, `shield_miss`, `mano_bonus`, `mano_aug`, `mano_spec`, `mano_miss`, `acrobatic_bonus`, `acrobatic_aug`, `acrobatic_spec`, `acrobatic_miss`, `ambidexterity_bonus`, `ambidexterity_aug`, `ambidexterity_spec`, `ambidexterity_miss`, `drive_bonus`, `drive_aug`, `drive_spec`, `drive_miss`, `run_bonus`, `run_aug`, `run_spec`, `run_miss`, `dodge_bonus`, `dodge_aug`, `dodge_spec`, `dodge_miss`, `mental_dodge_bonus`, `mental_dodge_aug`, `mental_dodge_spec`, `mental_dodge_miss`, `flexibility_bonus`, `flexibility_aug`, `flexibility_spec`, `flexibility_miss`, `athletic_bonus`, `athletic_aug`, `athletic_spec`, `athletic_miss`, `mount_bonus`, `mount_aug`, `mount_spec`, `mount_miss`, `swim_bonus`, `swim_aug`, `swim_spec`, `swim_miss`, `resist_poison_bonus`, `resist_poison_aug`, `resist_poison_spec`, `resist_poison_miss`, `resist_elec_bonus`, `resist_elec_aug`, `resist_elec_spec`, `resist_elec_miss`, `resist_fire_bonus`, `resist_fire_aug`, `resist_fire_spec`, `resist_fire_miss`, `resist_cold_bonus`, `resist_cold_aug`, `resist_cold_spec`, `resist_cold_miss`, `resist_magic_bonus`, `resist_magic_aug`, `resist_magic_spec`, `resist_magic_miss`, `jump_bonus`, `jump_aug`, `jump_spec`, `jump_miss`, `fly_bonus`, `fly_aug`, `fly_spec`, `fly_miss`, `arcane_bonus`, `arcane_aug`, `arcane_spec`, `arcane_miss`, `dez_bonus`, `dez_aug`, `dez_spec`, `dez_miss`, `manage_spell_bonus`, `manage_spell_aug`, `manage_spell_spec`, `manage_spell_miss`, `medit_bonus`, `medit_aug`, `medit_spec`, `medit_miss`, `rune_bonus`, `rune_aug`, `rune_spec`, `rune_miss`, `rituel_bonus`, `rituel_aug`, `rituel_spec`, `rituel_miss`, `night_vision_bonus`, `night_vision_aug`, `night_vision_spec`, `night_vision_miss`, `sens_bonus`, `sens_aug`, `sens_spec`, `sens_miss`, `dressage_bonus`, `dressage_aug`, `dressage_spec`, `dressage_miss`, `empathie_bonus`, `empathie_aug`, `empathie_spec`, `empathie_miss`, `orientation_bonus`, `orientation_aug`, `orientation_spec`, `orientation_miss`, `heal_bonus`, `heal_aug`, `heal_spec`, `heal_miss`, `survive_bonus`, `survive_aug`, `survive_spec`, `survive_miss`, `vigilant_bonus`, `vigilant_aug`, `vigilant_spec`, `vigilant_miss`, `arti_wood_bonus`, `arti_wood_aug`, `arti_wood_spec`, `arti_wood_miss`, `arti_skin_bonus`, `arti_skin_aug`, `arti_skin_spec`, `arti_skin_miss`, `arti_metal_bonus`, `arti_metal_aug`, `arti_metal_spec`, `arti_metal_miss`, `arti_cloth_bonus`, `arti_cloth_aug`, `arti_cloth_spec`, `arti_cloth_miss`, `picking_bonus`, `picking_aug`, `picking_spec`, `picking_miss`, `draw_bonus`, `draw_aug`, `draw_spec`, `draw_miss`, `discretion_bonus`, `discretion_aug`, `discretion_spec`, `discretion_miss`, `hide_bonus`, `hide_aug`, `hide_spec`, `hide_miss`, `trap_bonus`, `trap_aug`, `trap_spec`, `trap_miss`, `track_bonus`, `track_aug`, `track_spec`, `track_miss`, `theft_bonus`, `theft_aug`, `theft_spec`, `theft_miss`, `spiel_bonus`, `spiel_aug`, `spiel_spec`, `spiel_miss`, `trade_bonus`, `trade_aug`, `trade_spec`, `trade_miss`, `diplomacy_bonus`, `diplomacy_aug`, `diplomacy_spec`, `diplomacy_miss`, `intimidation_bonus`, `intimidation_aug`, `intimidation_spec`, `intimidation_miss`, `read_on_lips_bonus`, `read_on_lips_aug`, `read_on_lips_spec`, `read_on_lips_miss`, `politic_bonus`, `politic_aug`, `politic_spec`, `politic_miss`, `psychology_bonus`, `psychology_aug`, `psychology_spec`, `psychology_miss`, `seduction_bonus`, `seduction_aug`, `seduction_spec`, `seduction_miss`, `transformism_bonus`, `transformism_aug`, `transformism_spec`, `transformism_miss`, `cook_bonus`, `cook_aug`, `cook_spec`, `cook_miss`, `teach_bonus`, `teach_aug`, `teach_spec`, `teach_miss`, `geography_bonus`, `geography_aug`, `geography_spec`, `geography_miss`, `voice_bonus`, `voice_aug`, `voice_spec`, `voice_miss`, `stewardship_bonus`, `stewardship_aug`, `stewardship_spec`, `stewardship_miss`, `engine_bonus`, `engine_aug`, `engine_spec`, `engine_miss`, `strategy_bonus`, `strategy_aug`, `strategy_spec`, `strategy_miss`, `manage_mana_bonus`, `manage_mana_aug`, `manage_mana_spec`, `manage_mana_miss`, `alchimic_bonus`, `alchimic_aug`, `alchimic_spec`, `alchimic_miss`, `psy_bonus`, `psy_aug`, `psy_spec`, `psy_miss`, `onehand_weapon_jet`, `twohand_weapon_jet`, `ranged_weapon_jet`, `artillery_jet`, `shield_jet`, `mano_jet`, `acrobatic_jet`, `ambidexterity_jet`, `drive_jet`, `run_jet`, `dodge_jet`, `mental_dodge_jet`, `flexibility_jet`, `athletic_jet`, `mount_jet`, `swim_jet`, `resist_poison_jet`, `resist_elec_jet`, `resist_fire_jet`, `resist_cold_jet`, `resist_magic_jet`, `jump_jet`, `fly_jet`, `arcane_jet`, `dez_jet`, `manage_spell_jet`, `medit_jet`, `rune_jet`, `rituel_jet`, `night_vision_jet`, `sens_jet`, `dressage_jet`, `empathie_jet`, `orientation_jet`, `heal_jet`, `survive_jet`, `vigilant_jet`, `arti_wood_jet`, `arti_skin_jet`, `arti_metal_jet`, `arti_cloth_jet`, `picking_jet`, `draw_jet`, `discretion_jet`, `hide_jet`, `trap_jet`, `track_jet`, `theft_jet`, `spiel_jet`, `trade_jet`, `diplomacy_jet`, `intimidation_jet`, `read_on_lips_jet`, `politic_jet`, `psychology_jet`, `seduction_jet`, `transformism_jet`, `cook_jet`, `teach_jet`, `geography_jet`, `voice_jet`, `stewardship_jet`, `engine_jet`, `strategy_jet`, `manage_mana_jet`, `alchimic_jet`, `psy_jet`) VALUES
(1, 0, 4, 1, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 4, 0, 0, 0, 0, 0, 0, 2, 1, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `jdr_spell`
--

CREATE TABLE IF NOT EXISTS `jdr_spell` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `spells` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'a:0:{}',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `jdr_spell`
--

INSERT INTO `jdr_spell` (`id`, `spells`) VALUES
(1, 'a:14:{s:6:"list-1";i:1;s:14:"list-1-spell-1";i:1;s:14:"list-1-spell-2";i:1;s:14:"list-1-spell-3";i:1;s:6:"list-2";i:1;s:14:"list-2-spell-1";i:1;s:14:"list-2-spell-2";i:1;s:14:"list-3-spell-1";i:1;s:14:"list-3-spell-2";i:1;s:14:"list-3-spell-3";i:1;s:14:"list-4-spell-1";i:1;s:14:"list-4-spell-2";i:1;s:14:"list-5-spell-1";i:1;s:14:"list-5-spell-2";i:1;}'),
(2, 'a:0:{}'),
(3, 'a:0:{}'),
(4, 'a:0:{}');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
