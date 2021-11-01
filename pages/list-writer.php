<?php 
 $writers = get_writers();
?>
<section class="section-list-writer">
  
  <h1>Liste des écrivains</h1>
  <table>
      <thead>
          <tr>
              <th>Prénom</th>
              <th>Nom</th>
              <th>Date de naissance</th>
          </tr>
      </thead>
      <tbody>
          <?php 
              foreach( $writers as $writer ){ 
              $id = $writer->id;  
              ?>
                  <tr>
                      <td><?= $writer->firstname ?></td>
                      <td><?= $writer->lastname ?></td>
                      <td><?= $writer->birthday ?></td>
                  </tr>
          <?php }
          ?>
      </tbody>
  </table>
</section>