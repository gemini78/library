<?php
$pseudo = get_session_user();
$auth = false;
if (isset($pseudo) && !empty($pseudo)) {
  $auth = true;
}

if (isset($_GET['search'])) {
  $results = get_books_all($_GET['search']);
  $books = $results['rows'];
} else {
  $results = get_books_all();
  $books = $results['rows'];
  $zonePagination = $results['pagination'];
  $nbBookPage = $zonePagination['nbBookPage'];
  $current = $zonePagination['current'];
}
?>
<section class="section-home">
  <h1>Les livres</h1>
  <form method="get">
    <input type="text" name="search" id="search" style="width:auto">
    <input class="button" type="submit" value="Recherche" style="width:auto">
  </form>

  <div class="containerWriter">
    <a href="?page=list-writer" class="button">Liste des écrivains</a>
    <a href="?page=add-writer" class="button">Ajouter un écrivain</a>
  </div>

  <div style="overflow-x:auto;">
    <table class="styled-table">
      <thead>
        <tr>
          <th>Pochette</th>
          <th>Titre</th>
          <th>Ecrivain</th>
          <th>Price</th>
          <?php
          if ($auth) { ?>
            <th>Actions</th>
          <?php  }
          ?>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($books as $book) {
          $id = $book->id;
        ?>
          <tr>
            <td>
              <div class="containerImage">
                <img src="./images/<?= $book->path_image; ?>" alt="Image du livre">
  
                <span class="cart"><a href="?page=add-cart&id=<?= $id ?>" title="Ajouter au panier"><i class="fas fa-2x fa-cart-plus"></i></a></span>
              </div>
            </td>
            <td><?= $book->title ?></td>
            <td><?= strtolower($book->firstname . ' ' . $book->lastname); ?></td>
            <td><?= number_format($book->price, 2, '.', ' ') ?> €</td>
            <?php
            if ($auth) { ?>
              <td>
                <div class="areaActions">
                  <a class='btn-modify' href="?page=update-book&id=<?= $id ?>"><i class="fas fa-edit"></i></a>
                  <a class='btn-delete' data-id="<?= $id ?>" href="#" onclick="deleteElement(this)"><i class="fas fa-trash-alt"></i></a>
                </div>
              </td>
            <?php  }
            ?>
  
          </tr>
        <?php }
        ?>
      </tbody>
      <tfoot>
        <td colspan="4">&nbsp;</td>
      </tfoot>
    </table>
  </div>

  <?php
  if (isset($zonePagination)) { ?>
    <div class="container_pagination">
      <ul class="pagination">
        <li class="<?php if ($current == 1) {
            echo 'disabled';
          }  ?>"><a class="button" href="?page=home&p=<?php if ($current != 1) {
            echo ($current - 1);
          } else {
            echo $current;
          }  ?>">&laquo;</a>
        </li>
        <?php
        for ($i = 1; $i <= $nbBookPage; $i++) {
          if ($i == $current) { ?>
            <li class="button active"><a href="?page=home&p=<?= $i  ?>"><?= $i  ?></a></li>
          <?php } else { ?>
            <li><a class="button" href="?page=home&p=<?= $i  ?>"><?= $i  ?></a></li>
        <?php }
        }
        ?>
        <li class="<?php if ($current == $nbBookPage) {
          echo 'disabled';
        }  ?>"><a class="button" href="?page=home&p=<?php if ($current != $nbBookPage) {
          echo ($current + 1);
        } else {
          echo $current;
        }  ?>">&raquo;</a>
        </li>
      </ul>
    </div>
  <?php
  }
  ?>
</section>