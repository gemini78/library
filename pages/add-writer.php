<?php 
  if (isset($_POST['valider'])) {
    if( not_empty(['firstname','lastname','birthday']) ) {
        extract($_POST);
        $errors = [];
        
        if( count($errors) == 0) {
            //enregistrement en BDD
            createWriter($firstname,$lastname,$birthday);

            //Redirection vers home
            header('Location: ?page=home');
        }

   } else {
        $errors[] = "Veuillez SVP remplir tous les champs !";
   }
}
   
?>
<section class="section-add-writer">
  
    <h1>Ajouter un écrivain</h1>
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
        <label for="firstname">Firstname:</label><br>
        <input type="text" id="firstname" name="firstname"><br>

        <label for="lastname">Lastname:</label><br>
        <input type="text" id="lastname" name="lastname"><br>

        <label for="birthday">Birthday:</label><br>
        <input type="date" id="birthday" name="birthday"><br>

        <input type="submit" name="valider" value="VALIDER"/>
    </form>
</section>