<?php
$writers = get_writers();
?>
<section class="section-list-writer">

    <h1>Les écrivains</h1>

    <a class="button" href="#" onclick="goBack()">Retour à l'accueil</a>

    <div style="overflow-x:auto;">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Date de naissance</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($writers as $writer) {
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
            <!--
          <tfoot>
            <td colspan="3">&nbsp;</td>
          </tfoot>
        !-->
        </table>
    </div>
</section>