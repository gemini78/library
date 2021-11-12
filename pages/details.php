<?php
if ($_GET['id'] != 0) {
    $book = get_book_all($_GET['id']);
}
if (!$book) {
    set_flash('Livre inconnu', 'danger');

    redirect('?page=error');
}

?>
<section class="section-details-book">

    <h1>Détails</h1>

    <a class="button" href="#" onclick="goBack()">Retour à l'accueil</a>

    <div class="container-details-one">
        <div class="area-one">
            <img src="./images/<?= $book->path_image; ?>" width="250" height="250" alt="Image du livre">
        </div>
        <div class="area-two">
            <h2><?= $book->title ?></h2>
            <p>ISBN <?= $book->isbn ?></p>
            <p>Publié le <?= date('d/m/Y', strtotime($book->publish_at)); ?></p>
            <p>Prix <?=$book->price ?> €</p>
            <p>Par <span><?= $book->firstname.' '.$book->lastname  ?></span></p>
        </div>
    </div>
    <div class="container-details-two">
        <p><?= $book->synopsys ?></p>
    </div>
</section>