<?php
include('../filters/auth_filter.php');

if ($_GET['id'] == null || $_GET['id'] == '') {
    redirect('?page=error');
}

$id = $_GET['id'];
$book = get_book($id);

if (!$book) {
    set_flash('Livre inconnu', 'danger');
    redirect('?page=error');
}
if ($book) {
    $path_image = $book->path_image;
    if (delete_book($id)) {
        deleteFileIfExiste($path_image);
        set_flash('Le livre a été supprimé', 'success');
    
        //Redirection vers home
        redirect('?page=home');
    }
}
