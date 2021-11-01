<?php 
  
  if (isset($_GET['search'])) {
    $results = get_books_all($_GET['search']);
    $books = $results['rows'];
  } else {
    $results = get_books_all();
    $books = $results['rows'];
    $zonePagination = $results['pagination'];
    $nbBookPage = $zonePagination['nbBookPage'];
    $current = $zonePagination['current'];
   /*
    var_dump($nbBookPage,$current);
    die;
    */
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
              <th>Titre</th>
              <th>Couverture</th>
              <th>Isbn</th>
              <th>Publié le</th>
              <th>Ecrivain</th>
              <th>Actions</th>
          </tr>
      </thead>
      <tbody>
          <?php 
              foreach( $books as $book ){ 
              $id = $book->id;  
              ?>
                  <tr>
                      <td><?= $book->title ?></td>
                      <td><img src="./images/noCover.jpg" alt="pas d'image"></td>
                      <td><?= $book->isbn ?></td>
                      <td><?= $book->publish_at ?></td>
                      <td><?= strtolower($book->firstname.' '.$book->lastname); ?></td>
                      <td>
                        <div class="areaActions">
                          <a class='btn-modify' href="?page=update-book&id=<?= $id ?>"><i class="fas fa-edit"></i></a>
                          <a  class='btn-delete' data-id="<?= $id ?>" href="#" onclick="deleteElement(this)"><i class="fas fa-trash-alt"></i></a>
                        </div>
                      </td>
                  </tr>
          <?php }
          ?>
      </tbody>
  </table>

  <?php 
  if(isset($zonePagination)) { ?>
    <div class="container_pagination">
      <ul class="pagination">
        <li class="<?php if($current==1) { echo 'disabled'; }  ?>"><a href="?page=home&p=<?php if($current!=1) { echo ($current-1);} else { echo $current; }  ?>">&laquo;</a></li>

        <?php
          for ($i=1; $i <= $nbBookPage; $i++) { 
            if($i== $current) { ?>
              <li class="active"><a href="?page=home&p=<?= $i  ?>"><?= $i  ?></a></li>
            <?php } else { ?>
              <li ><a href="?page=home&p=<?= $i  ?>"><?= $i  ?></a></li>
            <?php }
          }
        ?>
        
        <li class="<?php if($current==$nbBookPage) { echo 'disabled'; }  ?>"><a href="?page=home&p=<?php if($current!=$nbBookPage) { echo ($current+1);} else { echo $current; }  ?>">&raquo;</a></li>

      </ul>
    </div>
  <?php 
  }
  ?>
</section>