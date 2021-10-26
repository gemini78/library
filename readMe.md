Parce que le fichier index.php est dans un dossier public pour lancer le serveur interne de PHP je dois donc executer la commande suivante:
php -S localhost:8000 -t public  

//chargement d'un script.sql dans la BDD library_db
mysql -u root -p library_db<sql/script.sql 

le site s'appuie sur une structure semi-mvc

l'url sera de la forme
...index.php?page=home
ou 
...index.php?page=add-book
ou
...index.php?page=update-book

index ira chercher les bons fichiers pour composer la page

le dossier pages contiendra toutes les pages
le dossier functions contiendra les différentes fonctions du site 