Installation

# on clone le projet

git clone...

on se deplace dans le projet
cd library

On installe les dépendances
composer install

On créer le fichier de configuration dans le dossier config:
créer un fichier nommé config.php avec la nomenclature suivante:
const DB_HOST = 'XXX';
const DB_NAME = 'XXX';
const DB_USER = 'XXX';
const DB_PASSWORD = 'XXX';

Pour lancer l'application:
ouvrir un terminal est taper la commande suivante:
php -S localhost:8000 -t public

Informations supplémentaire

//chargement d'un script.sql dans la BDD library_db
mysql -u root -p library_db<sql/script.sql

le site s'appuie sur une structure semi-mvc

l'url sera de la forme
...index.php?page=home
ou
...index.php?page=add-book
ou
...index.php?page=update-book

Structure
// router
index ira chercher les bons fichiers pour composer la page

le dossier pages contiendra toutes les pages
le dossier functions contient:
un fichier specifique pour chaque page (ex pour la page home.php cela donne home.func.php )
un fichier nommé main-functions.php (il contient la connexion à la BDD et des fonctions communes à toutes pages).

Dossier body:
Il contient le header et le footer

Sass:
dart-sass --> le compilateur
sass --> les fichiers scss
compile.bat et watch.bat --> script pour compiler et surveiller les changements

le dossier Sql
contient les differents script de création, insertion, modification, etc...

Pour exporter une BDD en CLI
mysqldump -u YourUser -p YourDatabaseName > wantedsqlfile.sql
exemple
mysqldump -u root -p library_db > sql/export/export-16-11-21.sql
