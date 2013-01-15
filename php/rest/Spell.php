<?php

class Spell extends RestProvider
{
    public function isHandler($url)
    {
        return $url === 'spell';
    }
    
    public function getDBTableName()
    {
        return 'jdr_spell';
    }
    
    public function getDBAllowedKeys()
    {
        return array(
            'spells'
        );
    }

    public function getLabels()
    {
        return array(
            'lvl' => App::t('lvl'),
            'mana' => App::t('mana'),    
            'diff_normal' => App::t('Difficulté'),    
            'diff_spec' => App::t('Difficulté spé.'),    
            'cost' => App::t('Coût aug'),
            'shod_hide_spells' => App::t('Afficher/Cacher tous les sorts et la légende', 'F')
        );
    }
    
    public function getSpellsLabel() 
    {
        return array(
            'list-1' => array(
                'name' => App::t('Soins'),
                'description' => App::t('Soigne les vivants, les morts et les coprs aux pieds.', 'F'),
                'spell-1' => App::t('Soigne 1D10/2 PV dont la gravité maximale est L', 'F'),
                'spell-2' => App::t('Soigne 2D10/5 PV dont la gravité maximale est M', 'F'),
                'spell-3' => App::t('Fait passer un personnage en Trépas à Grâve (toutes les cases sont cochées sauf 1)', 'F'),
                'spell-4' => App::t('Soigne 3D10/10 PV dont la gravité maximale est G', 'F'),
                'spell-5' => App::t('Soigne totalement une cible (si pas en Trépas) sauf 1D6 PV', 'F'),
                'spell-6' => App::t('Applique le sort de niveau 5 ou 3 à tous les membres du groupe', 'F')
            ),
            'list-2' => array(
                'name' => App::t('Elémentaire *'),
                'description' => App::t('Basique et efficace! On en demande rarement plus.', 'F'),
                'legend' => App::t('
                    A choisir avant de lancer un sort :<br/>
                    - Feu : +1/+0 aux dégâts<br/>
                    - Glace : les cases sont du terrain difficile<br/>
                    - Electricité : les crit. (L) deviennent des (M)<br/>
                    - Terre : les cibles touchées tombent au sol<br/>
                    Le sort lvl 2 est un bouclier, un seul sort de type "bouclier" actif sur une cible
                    ', 'F'),
                'spell-1' => App::t('Trait : dégâts des sorts +2/1 (L) à 10 cases', 'F'),
                'spell-2' => App::t('Bouclier : dégâts de (moitié du niveau dans cette liste) (non réductible) à l\'assaillant si il est dans les 10 cases pendant 1 rd', 'F'),
                'spell-3' => App::t('Boule : dégâts des sorts +3/2 (L) dans 3x3 à 10 cases', 'F'),
                'spell-4' => App::t('Explosion : fait exploser le sort lvl 2 sur 3 cases autour du lanceur. dégâts des sorts +3/2 (L)', 'F'),
                'spell-5' => App::t('Nuée : déchaine (2 * niveau dans cette liste) Trait de (élément) à 15 cases', 'F'),
                'spell-6' => App::t('lance 1 sort de cette liste gratuitement une fois par round jusqu\'à la fin du combat. Tant que ce sort est actif les sorts de cette liste coûtent la moitié en mana.', 'F')
            ),
            'list-3' => array(
                'name' => App::t('Enchantement *'),
                'description' => App::t('Il me faut plus de puissance.', 'F'),
                'legend' => App::t('Une fois le sort lancé il faut réussir un nombre de jet de la compétence Enchantement (voir la liste des enchantements)', 'F'),
                'spell-1' => App::t('Permet de lancer un enchantement de niveau 1', 'F'),
                'spell-2' => App::t('Permet de lancer un enchantement de niveau 2', 'F'),
                'spell-3' => App::t('Permet de lancer un enchantement de niveau 3', 'F'),
                'spell-4' => App::t('Permet de lancer un enchantement de niveau 4', 'F'),
                'spell-5' => App::t('Permet de lancer un enchantement de niveau 5', 'F'),
                'spell-6' => App::t('Permet de lancer un enchantement de niveau 6', 'F')
            ),
            'list-4' => array(
                'name' => App::t('Liaisons supérieures'),
                'description' => App::t('Je vais tellement si tant lui taper sa gueule, qu\'il va décéder.', 'F'),
                'spell-1' => App::t('+10 dans les compétences de Corps pendant 1h', 'F'),
                'spell-2' => App::t('+5 aux compétences de corps à corps et +1/+1 aux dégâts armes pendant 1 rd', 'F'),
                'spell-3' => App::t('+20 dans les compétences de Corps pendant 1h', 'F'),
                'spell-4' => App::t('+10 aux compétences de corps à corps et +3/+2 aux dégâts armes pendant 1D6 rd', 'F'),
                'spell-5' => App::t('+15 aux compétences de corps à corps et +6/+2 aux dégâts armes pendant 1D6 rd', 'F'),
                'spell-6' => App::t('+25 aux compétences de corps à corps et +6/+2 aux dégâts armes jusqu\'à la fin du combat', 'F')
            ),
            'list-5' => array(
                'name' => App::t('Invocation'),
                'description' => App::t('Petit, petit, petit...', 'F'),
                'spell-1' => App::t('Invoque une créature de 1PV qui disparait après 1h', 'F'),
                'spell-2' => App::t('Invoque une créature de 2PV qui disparait après 1h', 'F'),
                'spell-3' => App::t('Invoque une créature de 3PV qui disparait après 1h', 'F'),
                'spell-4' => App::t('Invoque une créature de 5PV qui disparait après 1h', 'F'),
                'spell-5' => App::t('Invoque une créature de 7PV qui disparait après 1h', 'F'),
                'spell-6' => App::t('Invoque une créature avec les même caractéristiques que le lanceur disparait après 1h', 'F')
            ),
            'list-6' => array(
                'name' => App::t('Attaque mentale'),
                'description' => App::t('Tu es UN-E GRO-SSE MER-DE !', 'F'),
                'spell-1' => App::t('Une cible à 10 cases subit un critique L. Dégâts des sorts -3/0.', 'F'),
                'spell-2' => App::t('Une cible à 10 cases est hébété. Dégâts des sorts -2/0.', 'F'),
                'spell-3' => App::t('Une cible à 10 cases est Etourdi. Dégâts des sorts -2/0.', 'F'),
                'spell-4' => App::t('Une cible à 10 cases subit deux critique M. Dégâts des sorts -2/1.', 'F'),
                'spell-5' => App::t('Prend le contrôle de la cible pendant 1 rd', 'F'),
                'spell-6' => App::t('Prend le contrôle de la cible pendant 1h', 'F')
            ),
            'list-7' => array(
                'name' => App::t('Concentration'),
                'description' => App::t('Je sens monter la magie, oui je la sens bien.', 'F'),
                'spell-1' => App::t('+10 dans les compétences de Magie pendant 1h', 'F'),
                'spell-2' => App::t('+5 à direction de sort et +1/+1 aux dégâts des sorts pendant 1 rd', 'F'),
                'spell-3' => App::t('+20 dans les compétences de Magie pendant 1h', 'F'),
                'spell-4' => App::t('+10 à direction de sort et +3/+2 aux dégâts des sorts pendant 1D6 rd', 'F'),
                'spell-5' => App::t('+15 à direction de sort et +6/+2 aux dégâts des sorts pendant 1D6 rd', 'F'),
                'spell-6' => App::t('+25 à direction de sort et +6/+2 aux dégâts des sorts jusqu\'à la fin du combat', 'F')
            ),
            'list-8' => array(
                'name' => App::t('Protection *'),
                'description' => App::t('Même pas mal.', 'F'),
                'legend' => App::t('
                    Une seul sort de la cible actif sur la cible<br/>
                    Dure jusqu\'au prochain repos long', 'F'),
                'spell-1' => App::t('Armure magique qui réduit les dégâts de 1', 'F'),
                'spell-2' => App::t('Armure magique qui réduit les dégâts de 2', 'F'),
                'spell-3' => App::t('Armure magique qui réduit les dégâts de 3 et les critiques de 1 niveau', 'F'),
                'spell-4' => App::t('Armure magique qui réduit les dégâts de 4 et les critiques de 1 niveau', 'F'),
                'spell-5' => App::t('Armure magique qui réduit les dégâts de 5 et les critiques de 1 niveau', 'F'),
                'spell-6' => App::t('Armure magique qui réduit les dégâts de 6 et les critiques de 2 niveau', 'F')
            ),
            'list-9' => array(
                'name' => App::t('implantation *'),
                'description' => App::t('Plus besoin de mana, votre épée 3000+ balance des boules de feu.', 'F'),
                'legend' => App::t('
                    Nécessite un jet réussi de rituel en plus du sort<br/>
                    La somme des [a] et [b] d\'un sort doit être égale au total
                    ', 'F'),
                'spell-1' => App::t('implante un sort de lvl 1 qui peut être lancé 1 fois par jour dans un objet', 'F'),
                'spell-2' => App::t('implante un sort de lvl [a] qui peut être lancé [b] fois par jour dans un objet (total = 3)', 'F'),
                'spell-3' => App::t('implante un(des) sort(s) de lvl [a] (max 2) qui peut être lancé [b] fois par jour dans un objet (total = 5)', 'F'),
                'spell-4' => App::t('implante un(des) sort(s) de lvl [a] (max 3) qui peut être lancé [b] fois par jour dans un objet (total = 7)', 'F'),
                'spell-5' => App::t('implante un(des) sort(s) de lvl [a] (max 5) qui peut être lancé [b] fois par jour dans un objet (total = 9)', 'F'),
                'spell-6' => App::t('implante un additionneur de mana 1D100 (minimum 50)', 'F')
            ),
            'list-10' => array(
                'name' => App::t('Déflection *'),
                'description' => App::t('Mate le tir, en plein dans la tronche ... ah bé non finalement!', 'F'),
                'legend' => App::t('Les sorts de lvl 1, 3 et 4 peuvent être utilisé à la place d\'une défense un seul sort de type "bouclier" actif sur une cible', 'F'),
                'spell-1' => App::t('- 30 à l\'attaque', 'F'),
                'spell-2' => App::t('Bouclier de -20 aux attaques pendant 1 rd', 'F'),
                'spell-3' => App::t('- 60 à l\'attaque', 'F'),
                'spell-4' => App::t('- 100 à l\'attaque', 'F'),
                'spell-5' => App::t('Bouclier de -40 aux attaques pendant 1D6 rd', 'F'),
                'spell-6' => App::t('Bouclier de -75 aux attaques pour le combat', 'F')
            ),
            'list-11' => array(
                'name' => App::t('Déplacement'),
                'description' => App::t('Il court, il court, et il transplane', 'F'),
                'spell-1' => App::t('Marche dans les arbres pendant 1D6 rd', 'F'),
                'spell-2' => App::t('La cible effectue un bond sur une distance de 2 fois le mouvement', 'F'),
                'spell-3' => App::t('Marche dans les airs pendant 1D6 rd', 'F'),
                'spell-4' => App::t('Téléporte la cible sur (Esprit) cases', 'F'),
                'spell-5' => App::t('Donne des ailes à la cible durant 1d6 heures (le mouvement ne change pas)', 'F'),
                'spell-6' => App::t('Téléportation de groupe sur (Esprit) kilomètres', 'F')
            ),
            'list-12' => array(
                'name' => App::t('Télékinésie / Télépathie'),
                'description' => App::t('Regarde ça, sans les mains !', 'F'),
                'spell-1' => App::t('Parle à une cible par télépathie', 'F'),
                'spell-2' => App::t('Déplace un objet à une vitesse de mouvement/2', 'F'),
                'spell-3' => App::t('Déplace un objet lourd à une vitesse de mouvement/3 ou un objet léger à grande vitesse (1 A)', 'F'),
                'spell-4' => App::t('Parle à toutes les personnes souhaités dans les (Esprit) cases autour du lanceur', 'F'),
                'spell-5' => App::t('Un flux de magie télépathique fait subir un critique G à la cible', 'F'),
                'spell-6' => App::t('Les sorts de lvl 1 à 4 ne coutent aucun mana pendant 1h', 'F')
            ),
            'list-13' => array(
                'name' => App::t('Evocation *'),
                'description' => App::t('Toujours pratique quand on voyage.', 'F'),
                'legend' => App::t('Une seule aura à la fois', 'F'),
                'spell-1' => App::t('Créé un mur de terre de 2x2x1 (HxLxP) qui part du sol, avec 5PV', 'F'),
                'spell-2' => App::t('Invoque un disque volant de 3 cases de diamètre qui peut porter de lourde charge pendant 1h', 'F'),
                'spell-3' => App::t('Créé un mur de terre de 3x3x1 (HxLxP) n\importe ou, avec 5PV. Le mur est invisible.', 'F'),
                'spell-4' => App::t('Aura de 6 cases à l\'intérieur de laquelle les enemis subissent 1 dégâts non réudctible en début de leur round', 'F'),
                'spell-5' => App::t('Aura de 6 cases à l\'intérieur de laquelle les enemis subissent 2 dégâts non réudctible et sont immobilisés (résist. magie) en début de leur round', 'F'),
                'spell-6' => App::t('Aura de 6 cases à l\'intérieur de laquelle les alliés récupèrent 3PV (sauf si T), gagnent +15 aux compétences et +2/+0 aux dégâts', 'F')
            ),
            'list-14' => array(
                'name' => App::t('Divination *'),
                'description' => App::t('Je sais ce que tu vas faire, même si je te dis que je le sais', 'F'),
                'legend' => App::t('Le sort lvl 6 ne peut être lancé que 3 fois dans une vie, sous peine de mort', 'F'),
                'spell-1' => App::t('Ajoute un bonus de +20 au prochain jet de 6ème sens', 'F'),
                'spell-2' => App::t('Donne l\initiative pour le prochain tour', 'F'),
                'spell-3' => App::t('Vous savez si la dernière réponse à une question est une vérité ou un mensonge', 'F'),
                'spell-4' => App::t('Permet de récupérer des brides d\'informations sur un sujet très précis', 'F'),
                'spell-5' => App::t('Donne l\initiative pour tout le combat', 'F'),
                'spell-6' => App::t('Le Destin dévoile ses dessous et répond à une question', 'F')
            ),
            'list-15' => array(
                'name' => App::t('Temps'),
                'description' => App::t('C\'est qu\'il va vite le con', 'F'),
                'spell-1' => App::t('Double le déplacement pendant 1d6 rd', 'F'),
                'spell-2' => App::t('Divise le déplacement par 2 pendant 1d6 rd', 'F'),
                'spell-3' => App::t('Double le déplacement du groupe pendant 1D6 rd', 'F'),
                'spell-4' => App::t('Ajoute une action à tous les rd pendant 1D6 rd', 'F'),
                'spell-5' => App::t('Ajoute une action au groupe pendant 1D6 rd', 'F'),
                'spell-6' => App::t('Effectue 2 tour entier sans que les autres personnages n\'agissent dans un carré de 10 cases', 'F')
            ),
            'list-16' => array(
                'name' => App::t('Transformation'),
                'description' => App::t('Oh le gentil petit garçon ... AHAahahahaah !', 'F'),
                'spell-1' => App::t('Augmente ou diminue sa taille de 20% pendant 1h. Bonus de +10 en Athlétisme, Saut, Course et Intimidation.', 'F'),
                'spell-2' => App::t('Augmente ou diminue sa taille de 50% pendant 1h. Bonus de +20 en Athlétisme, Saut, Course et Intimidation.', 'F'),
                'spell-3' => App::t('Change le corps d\'une cible sans pouvoir changer de race pendant 1h', 'F'),
                'spell-4' => App::t('Change le corps d\'une cible et ses objets sans pouvoir devenir inanimé ou inversement pendant 1h', 'F'),
                'spell-5' => App::t('Change le corps d\'une cible en n\'importe quoi sans pouvoir modifier la masse de plus de 50% pendant 1h', 'F'),
                'spell-6' => App::t('Change le corps d\'une cible sans pouvoir augmenter/diminuer la masse de plus de 1000%', 'F')
            ),
            'list-17' => array(
                'name' => App::t('Invisibilité / Illusion'),
                'description' => App::t('Ils étaient la puis pouf pouf ils ont disparu.', 'F'),
                'spell-1' => App::t('Rend un objet invisible', 'F'),
                'spell-2' => App::t('Rend un individu invisible', 'F'),
                'spell-3' => App::t('Créer une image d\'une cible qui ne peut rien faire', 'F'),
                'spell-4' => App::t('Créer une image de soie même qui peut se déplacer, parler, attaquer à la place du lanceur de sort', 'F'),
                'spell-5' => App::t('Lance le sort lvl 2 sur 8 cibles maximum', 'F'),
                'spell-6' => App::t('Lance le sort lvl 2 puis le lvl 4 sur 5 cibles maximum', 'F')
            ),
            'list-18' => array(
                'name' => App::t('Survie'),
                'description' => App::t('Pour certains c\'est une merde d\'ours, pour d\'autre une chance de ne pas mourrir de faim.', 'F'),
                'spell-1' => App::t('Ajoute +10 au prochain jet de survie', 'F'),
                'spell-2' => App::t('Permet de trouver de l\eau', 'F'),
                'spell-3' => App::t('Permet de trouver de la nourriture', 'F'),
                'spell-4' => App::t('Ajoute +40 aux jet de survie pendant 1h', 'F'),
                'spell-5' => App::t('Ajoute +10 à toutes les compétences tant que la cible est en dehors des villes', 'F'),
                'spell-6' => App::t('Création d\'une corne d\'abondance qui permet à 1 personne de manger et boire pendant 1 journée. Se régénère toutes les nuits.', 'F')
            ),
            'list-19' => array(
                'name' => App::t('Peur'),
                'description' => App::t('Maman !', 'F'),
                'spell-1' => App::t('La cible a -10 aux compétences pendant 1 rd', 'F'),
                'spell-2' => App::t('La cible a -2/-1 aux dégâts pendant 1 rd', 'F'),
                'spell-3' => App::t('La cible fuit le plus loin possible du lanceur de sort pendant 1 rd', 'F'),
                'spell-4' => App::t('La cible a -15 aux compétences et -2/-1 aux dégâts pendant 1D6 rd', 'F'),
                'spell-5' => App::t('La cible est tétanisé par la peur. Elle ne peut effectuer aucune action tant qu\'elle est dans cet état', 'F'),
                'spell-6' => App::t('La cible a -25 aux compétences et -5/-2 aux dégâts jusqu\'à la fin du combat', 'F')
            ),
            'list-20' => array(
                'name' => App::t('Ténèbres'),
                'description' => App::t('C\'est moi ou elle tombe super vite la nuite ici ?', 'F'),
                'spell-1' => App::t('La cible est invisible quand elle est dans les ombres', 'F'),
                'spell-2' => App::t('La pièce devient noire, on peut toujours y voir avec vision nocturne. Sinon -10 aux compétences physiques. Dure 1 rd', 'F'),
                'spell-3' => App::t('Un éclair de ténèbre part tout droit et à travers les cibles sur 15 cases. Dégâts des sorts 4/2.', 'F'),
                'spell-4' => App::t('La pièce devient noire magiquement, les cibles choisi y voient normalement. Dure 1D6 rd.', 'F'),
                'spell-5' => App::t('Un nuage de 5 cases qui dure 1D6 rd, les adversaires qui débutent leur tour à l\'intérieur subissent un critique M', 'F'),
                'spell-6' => App::t('Toutes les pièces dans une zone de 500m de diamètre subissent le sort lvl 4 pendant 1h.', 'F')
            )
        );
    }

    public function getData($data)
    {
        $characData = Rest::restGet('Charac', $data['id'], 'fk_life');
        
        $data['spells_label'] = $this->getSpellsLabel();
        $data['spells'] = unserialize($data['spells']);
        
        $data['spell_lvl_max'] = floor($characData['mag_total'] * 6 / 90);
        
        $data['misc_per_lvl'] = array(
            'lvl-1' => array('lvl' => 1, 'mana' => 2, 'diff' => 0, 'diff_spec' => '+15', 'aug' => 1),
            'lvl-2' => array('lvl' => 2, 'mana' => 5, 'diff' => -5, 'diff_spec' => '+10', 'aug' => 2),
            'lvl-3' => array('lvl' => 3, 'mana' => 10, 'diff' => -10, 'diff_spec' => '+5', 'aug' => 4),
            'lvl-4' => array('lvl' => 4, 'mana' => 20, 'diff' => -15, 'diff_spec' => -5, 'aug' => 8),
            'lvl-5' => array('lvl' => 5, 'mana' => 30, 'diff' => -20, 'diff_spec' => -10, 'aug' => 12),
            'lvl-6' => array('lvl' => 6, 'mana' => 50, 'diff' => -30, 'diff_spec' => -15, 'aug' => 20)
        );
        
        $countSpec = 0;
        $countSpec += $this->countSpec($data['id']);
        $countSpec += Rest::$rests['Skill']->countSpec($data['id']);
        
        $data['show_unchecked_spec'] = true;
        if ($countSpec == floor($characData['int_total'] / 10)) {
            $data['show_unchecked_spec'] = false;
        }
        
        return $data;
    }
    
    public function countAug($id)
    {
        $data = Database::handleRequest($this->getDBTableName(), $id, $this->keyName, $this->getDBAllowedKeys());
        $data['spells'] = unserialize($data['spells']);
        
        $countAug = 0;
        foreach($data['spells'] as $key => $value) {
            $spellLvl = strstr($key, 'spell-');
            if ($spellLvl !== false) {
                $countAug += $this->getAugCostPerLvl($spellLvl);
            }
        }
        
        return $countAug;
    }
    
    public function countSpec($id)
    {
        $data = Database::handleRequest($this->getDBTableName(), $id, $this->keyName, $this->getDBAllowedKeys());
        $data['spells'] = unserialize($data['spells']);
        
        $count = 0;
        foreach($data['spells'] as $key => $value) {
            if (mb_strpos($key, 'spell') === false) {
                $count++;
            }
        }
        
        return $count;
    }
    
    public function handle($key)
    {
        $data = Database::handleRequest($this->getDBTableName(), $key, $this->keyName, $this->getDBAllowedKeys(), $this->formatData(Rest::$data));
        $data = array_merge($this->getData($data), $this->getLabels());
        
        Rest::send($data);
    }
    
    public function formatData($data)
    {
        if ($data !== null && isset($data['spells'])) {
            $data['spells'] = serialize($data['spells']);
        }
        
        return $data;
    }
    
    private function getAugCostPerLvl($lvl)
    {
        $cost = 0;
        switch ($lvl) {
            case 'spell-1': $cost = 1; break;
            case 'spell-2': $cost = 2; break;
            case 'spell-3': $cost = 4; break;
            case 'spell-4': $cost = 8; break;
            case 'spell-5': $cost = 12; break;
            case 'spell-6': $cost = 20; break;
        }
        
        return $cost;
    }
}