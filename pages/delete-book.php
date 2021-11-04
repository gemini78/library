<?php
include('../filters/auth_filter.php');

if ($_GET['id'] == null || $_GET['id'] == '') {
    redirect('?page=error');
}

$id = $_GET['id'];

if (delete_book($id)) {
    set_flash('Le livre a été supprimé', 'success');

    //Redirection vers home
    header('Location: ?page=home');  
}