# JDR des zautres

Le code de l'application character-sheet et la documentation (les règles et autres aides) du JDR que je meujeute avec les "zautres" joueurs.

## Installation

- Créer une BD alexgaliddhelp accessible par le user root, sans password.
- Exécuter le fichier full.sql (contient la structure et des données)
- Accéder à la page URL_DU_SITE/1 (ou 1 est l'identifiant d'un personnage, il y en a 4 au départ)
    ex: En local si on a pas ajouté de Host à apache c'est en général http://localhost/Character-Sheet/1

## TODOS

- Tootip descriptif sur de la base au clic
- Un champ permettant de traduire le total courant d'une ressource (mana, point de destin, point d'action, ...), à droite du total de la ressource
- Save des armes (toujours afficher toutes les lignes possibles)
- Gérer le zoom avec la barre en position fixe (pour les tablettes)
- L'initiative doit baisser avec l'état du perso (comme les compétences)