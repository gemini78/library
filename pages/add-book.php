<?php 
    $writers = get_writers();

    if (isset($_POST['valider'])) {
        if( not_empty(['title','isbn','publish_at','writer']) ) {
            extract($_POST);
            $errors = [];


            if(is_already_use('isbn',$isbn, 'book')) {
                $errors[] = 'ISBN déjà utilisé';
            }
            
            if( count($errors) == 0) {
                //enregistrement en BDD
                createBook($title,$isbn,$publish_at,$writer);

                //Redirection vers home
                header('Location: ?page=home');
            }

       } else {
            $errors[] = "Veuillez SVP remmplir tous les champs !";
       }
    }
?>
<section class="section-add-book">
  
    <h1>Ajouter un livre</h1>
    <?php 
    if(isset($errors) && count($errors) != 0) {
        foreach ($errors as $error) {
            echo $error . '<br/>';
        }
    }
    ?>
    <form method="POST">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title"><br>

        <label for="isbn">Isbn:</label><br>
        <input type="text" id="isbn" name="isbn"><br>

        <label for="publish_at">Date de publication:</label><br>
        <input type="date" id="publish_at" name="publish_at"><br>

        <label for="writer">Ecrivain:</label><br>
        <select input id="writer" name="writer">
            <?php 
            foreach ($writers as $writer) { ?>
                <option value="<?=  $writer->id ?>"><?= $writer->firstname.' '.$writer->lastname ?></option>
            <?php  }
            ?>
        </select><br>
        <input type="submit" name="valider" value="valider"/>
    </form>
</section>