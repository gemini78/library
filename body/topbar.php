<?php 
    $pseudo = get_session_user();
    $auth = false;
    if (isset($pseudo) && !empty($pseudo) ) {
        $auth = true;
    }
?>
<header>
    <div class="wrapper">
        <nav>
            <ul>
                <li class="<?php echo ($page=="home")? "active" : "" ?>"><a href="?page=home">Accueil</a></li>
                <?php 
                    if ($auth) { ?>
                        <li class="<?php echo ($page=="add-book")? "active" : "" ?>"><a href="?page=add-book">Ajouter un livre</a></li>
                <?php   }
                ?>
                <li class="<?php echo ($page=="login")? "active" : "" ?>"><a href="?page=login">login</a></li>
                <?php 
                    if ($auth) { ?>
                        <li class="<?php echo ($page=="logout")? "active" : "" ?>"><a href="?page=logout">logout</a></li>
                <?php }
                ?>
                <li class="<?php echo ($page=="add-cart")? "active" : "" ?>"><a href="?page=add-cart"><i class="fas fa-shopping-cart"></i> <span><?= number_format($cart->total() * 1.196, 2, '.', ' ') ?> €</span></a></li>
                <li><a class="menuItemPseudo" href="#">Hello <?= ($auth)?$pseudo:'Donkey' ?></a></li>
            </ul>
        </nav>
    </div>
</header>
<?php include('../body/flash.php');