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
            <p>Par <span><?= $book->firstname.' '.$book->lastname  ?></span></p>
        </div>
    </div>
    <div class="container-details-two">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. 
         Id quasi possimus nulla et consectetur alias optio assumenda voluptatum deserunt, 
         voluptas consequatur aliquid illo deleniti, corrupti vero. 
         Facere modi quis iure commodi omnis debitis quia nesciunt odio totam illum architecto earum ad, accusantium ex explicabo delectus culpa aperiam laborum officiis itaque est tempore. Sed vitae sit numquam aut, quis at dicta vero mollitia, eaque sint ipsam? Error, ipsam dicta dolorum reprehenderit tenetur ratione quia et molestias repudiandae iure quos, nam, consectetur voluptatibus totam ab repellendus! Perspiciatis sapiente quis illo tempore facilis aliquid fugit reiciendis cum vitae sint doloremque, aut praesentium tempora?</p>
    </div>
</section>