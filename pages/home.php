<?php 
  $books = get_books_all();
?>
<section class="section-home">
  
  <h1>Liste des livres</h1>
  <table>
      <thead>
          <tr>
              <th>Id</th>
              <th>Title</th>
              <th>Isbn</th>
              <th>Publish_at</th>
              <th>Writer</th>
          </tr>
      </thead>
      <tbody>
          <?php 
              foreach( $books as $book ){ ?>
                  <tr>
                      <td><?= $book->id ?></td>
                      <td><a href="#"><?= $book->title ?></a></td>
                      <td><?= $book->isbn ?></td>
                      <td><?= $book->publish_at ?></td>
                      <td><?= $book->firstname.' '.$book->lastname ?></td>
                  </tr>
          <?php }
          ?>
      </tbody>
  </table>
</section>