# UNIGUERRE

Le développement d'une version uniguerre en open source permet de relancer une suite à la génération XNova/Wootook.
Uniguerre est le nom d'un jeu dont l'administrateur est un membre de XNova/Wootook.


## Version de développement utilisée: wampserver 2.5

- Apache 2.4.9
- PHP 5.5.10
- MySQL 5.5.12-32b

## Participants au projet

- Kiwille (Développeur)
- Hoegarden (Développeur)
- Mandalorien (Designer, Développeur)

## Accès au jeu

Des comptes ont été créés pour accéder au jeu:
- id : kiwille , mdp : test 
- id : Manda , mdp : test
- id : demo , mdp : demo

## Contribuer au projet

**Vous pouvez bien sur parciper au projet suivant la documentation du wiki:
https://github.com/kiwille/uniguerre_v6/wiki**

Pensez à redémarrez votre PC une fois les installations terminées.
Wampserver doit afficher une icone vert dans votre barre des tâches, signifiant qu'il a démarré tous les services correctement.
L'utilisation de Github se fait de cette manière:
- Pour envoyer vos modifications sur Github, faites un "Git > Commit" puis un "Git > Remove > Push".
- Pour recevoir les mises à jour de code venant de Github, faites "Git > Remove > Pull".
A noter qu'avant de modifier le code, il est fortement recommandé de récupérer les mises à jour.

## Règles de commit

Les commentaires laissés lors d'un commit sont les suivantes:
- Le message commit doit commencé par le mot clé "fix", "doc", "add" et "refactor":
     - "fix" pour les corrections de bugs
     - "doc" pour la documentation
     - "add" pour l'ajout de nouvelles fonctionnalités
     - "refactor" si cela n'entre dans le cadre d'aucune de ces catégories précédentes (par ex., retrait de sauts de lignes)
- Le message commit doit être écrit en intégralité en minuscule
- Le message commit doit posséder un verbe conjugué à l'impératif
- Le message commit ne doit pas finir pas un point

Exemple à suivre:
- "fix: corrige l'affichage des planètes en 3D"
- "add: ajoute la maquette de la page principale des batiments"
- "doc: documente la classe Planete.class.php"

## Branches

Pour voir l'évolution du projet par commit: https://github.com/kiwille/uniguerre_v6/network
