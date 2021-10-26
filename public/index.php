<?php
    // connexion BDD
    include '../functions/main-functions.php';

    $pages= scandir('../pages/');
    if ( isset($_GET['page'])  && !empty($_GET['page']) ) {
        if ( in_array($_GET['page'].'.php', $pages)) {
            $page = $_GET['page'];
        } else {
            $page = 'error';
        }
    } else {
        $page = 'home';
    }

    // si le fichier $page.func.php existe on l'inclut
    $pages_functions = scandir('../functions');
    if (in_array($page . '.func.php', $pages_functions)) {
        include "../functions/$page" . '.func.php';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bibliothèque</title>
</head>
<body>
    <?php 
        include '../pages/' . $page . '.php';
    ?>
</body>
</html>