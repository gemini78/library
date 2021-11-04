<?php 
 $_SESSION['notification'] = [];
 $_SESSION['pseudo'] = [];
 set_flash("Déconnexion effectuée", 'success');
 redirect("?page=login");
?>