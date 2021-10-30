<?php 

  $count = get_rowCountBook();
  
  if (isset($_GET['search'])) {
    $books = get_books_all($_GET['search']);
  } else {
    $books = get_books_all();
  }
?>
<section class="section-home">
  <h1>Liste des livres</h1>
  <form method="get">
    <input type="text" name="search" id="search" style="width:auto">
    <input type="submit" value="Recherche" style="width:auto">
  </form>

  <table>
      <thead>
          <tr>
              <th>Id</th>
              <th>Title</th>
              <th>Isbn</th>
              <th>Publish_at</th>
              <th>Writer</th>
              <th>Actions</th>
          </tr>
      </thead>
      <tbody>
          <?php 
              foreach( $books as $book ){ 
              $id = $book->id;  
              ?>
                  <tr>
                      <td><?= $id ?></td>
                      <td><?= $book->title ?></td>
                      <td><?= $book->isbn ?></td>
                      <td><?= $book->publish_at ?></td>
                      <td><?= strtolower($book->firstname.' '.$book->lastname); ?></td>
                      <td><a class='btn-modify' href="?page=update-book&id=<?= $id ?>">modifier</a></td>
                      <td><a  class='btn-delete' data-id="<?= $id ?>" href="#" onclick="deleteElement(this)">supprimer</a></td>
                  </tr>
          <?php }
          ?>
      </tbody>
  </table>
</section>