<?php
include('../filters/auth_filter.php');

if ($_GET['id'] == null || $_GET['id'] == '') {
    redirect('?page=error');
}

$id = $_GET['id'];
$book = get_book($id);
if ($book) {
    $path_image = $book->path_image;
    if (delete_book($id)) {
        deleteFileIfExiste($path_image);
        set_flash('Le livre a été supprimé', 'success');
    
        //Redirection vers home
        header('Location: ?page=home');  
    }
}
