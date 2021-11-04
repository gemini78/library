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
                <li class="<?php echo ($page=="home")? "active" : "" ?>"><a href="?page=home">home</a></li>
                <li class="<?php echo ($page=="list-writer")? "active" : "" ?>"><a href="?page=list-writer">list-writer</a></li>
                <?php 
                    if ($auth) { ?>
                        <li class="<?php echo ($page=="add-book")? "active" : "" ?>"><a href="?page=add-book">add-book</a></li>
                        <li class="<?php echo ($page=="add-writer")? "active" : "" ?>"><a href="?page=add-writer">add-writer</a></li>
                <?php   }
                ?>
                <li class="<?php echo ($page=="login")? "active" : "" ?>"><a href="?page=login">login</a></li>
                <?php 
                    if ($auth) { ?>
                        <li class="<?php echo ($page=="logout")? "active" : "" ?>"><a href="?page=logout">logout</a></li>
                <?php }
                ?>
                <li class="<?php echo ($page=="test")? "active" : "" ?>"><a class="menuItemPseudo" href="#">Bonjour <?= ($auth)?$pseudo:'Donkey' ?></a></li>
            </ul>
        </nav>
    </div>
</header>
<?php include('../body/flash.php');