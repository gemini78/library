<?php
include('../filters/auth_filter.php');

if (isset($_POST['valider'])) {
    if (not_empty(['firstname', 'lastname', 'birthday'])) {
        extract($_POST);
        $errors = [];

        if (count($errors) == 0) {
            //enregistrement en BDD
            createWriter($firstname, $lastname, $birthday);

            set_flash("L'écrivain a été crée", 'success');

            //Redirection vers la liste des écrivains
            redirect('?page=list-writer');
        }
    } else {
        $errors[] = "Veuillez SVP remplir tous les champs !";
        save_input_data();
    }
} else {
    clear_input_data();
}

?>
<section class="section-add-writer">

    <h1>Ajouter un écrivain</h1>
    
    <a class="button" href="#" onclick="goBack()">Retour à l'accueil</a>

    <p class="errors">
        <?php
        if (isset($errors) && count($errors) != 0) {
            foreach ($errors as $error) {
                echo $error . '<br/>';
            }
        }
        ?>
    </p>

    <form method="POST">
        <label for="firstname">Prénom:</label>
        <input type="text" id="firstname" name="firstname" value="<?= get_input_data('firstname');  ?>" required>

        <label for="lastname">Nom:</label>
        <input type="text" id="lastname" name="lastname" value="<?= get_input_data('lastname');  ?>" required>

        <label for="birthday">Date de naissance:</label>
        <input type="date" id="birthday" name="birthday" value="<?= get_input_data('birthday');  ?>" required>

        <input class="button" type="submit" name="valider" value="VALIDER" />
    </form>
</section>