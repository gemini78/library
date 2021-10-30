<?php
    if($_GET['id'] == null || $_GET['id']=='') {
        header('Location: ?page=error');
        exit;
    }
    $id = $_GET['id'];
    $book = get_book($id);
    
    if(delete_book($id)) {
        echo "<script type='text/javascript'>
        document.body.style.background = 'rgba(0,0,0,0.3)';
        </script>";
    }
?>
<section class="section-delete-book" id="js-section-delete-book">
  
  <div class="content">
      <h1>Le livre <?= $book->title ?> a été supprimé</h1>
      <a class="btn-home" href="?page=home">Retour à l'accueil</a>
  </div>
</section>