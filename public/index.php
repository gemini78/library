<?php
    // session
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    // connexion BDD
    include '../functions/main-functions.php';

    // class Cart
    include '../classes/Cart.php';

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php 
        // navigation
        include '../body/topbar.php';
    ?>
    <main>
        <div class="wrapper">
            <?php     
                include '../pages/' . $page . '.php';
            ?>
        </div>
    </main>
    <?php 
        // footer
        include '../body/footer.php';
    ?>
    <script src="js/script.js"></script>
</body>
</html>