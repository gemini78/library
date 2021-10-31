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
            $errors[] = "Veuillez SVP remplir tous les champs !";
            save_input_data();
       }
    } else {
        clear_input_data();
    }
?>
<section class="section-add-book">
  
    <h1>Ajouter un livre</h1>
    <p class="errors">
    <?php 
    if(isset($errors) && count($errors) != 0) {
        foreach ($errors as $error) {
            echo $error . '<br/>';
        }
    }
    ?>
    </p>
    <form method="POST">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?= get_input_data('title');  ?>"><br>

        <label for="isbn">Isbn:</label><br>
        <input type="text" id="isbn" name="isbn" value="<?= get_input_data('isbn');  ?>"><br>

        <label for="publish_at">Date de publication:</label><br>
        <input type="date" id="publish_at" name="publish_at" value="<?= get_input_data('publish_at');  ?>"><br>

        <label for="writer">Ecrivain:</label><br>
        <select id="writer" name="writer">
            <?php 
            foreach ($writers as $writer) { ?>
                <option value="<?=  $writer->id ?>"><?= strtolower($writer->firstname.' '.$writer->lastname); ?></option>
            <?php  }
            ?>
        </select><br>
        <input type="submit" name="valider" value="VALIDER"/>
    </form>
</section>