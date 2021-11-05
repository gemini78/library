<?php 
 $_SESSION['notification'] = [];
 $_SESSION['pseudo'] = [];
 $_SESSION['cart'] = [];
 set_flash("Déconnexion effectuée", 'success');
 redirect("?page=login");
?>