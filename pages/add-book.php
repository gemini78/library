<?php
include('../filters/auth_filter.php');
$writers = get_writers();

if (isset($_POST['valider'])) {
    if (not_empty(['title', 'isbn', 'publish_at', 'writer', 'price'])) {
        extract($_POST);
        $errors = [];

        $title = e($title);
        $isbn = e($isbn);
        $publish_at = e($publish_at);
        $writer = e($writer);
        $price = e($price);

        if (is_already_use('isbn', $isbn, 'book')) {
            $errors[] = 'ISBN déjà utilisé';
        }

        if (!validatePrice($price)) {
            $errors[] = "Le prix n'est pas valide.";
        }

        if (isset($_FILES['path_image']) && isset($_FILES['path_image']['name']) && mb_strlen($_FILES['path_image']['name'])) {
            $fichier = $_FILES['path_image']['name'];
            $sizeMax = 2097152; // 2Go
            $size = filesize($_FILES['path_image']['tmp_name']);
            $extensions = ['.png', '.jpg', '.jpeg', '.gif', '.PNG', '.JPG', '.JPEG', '.GIF'];
            $extension = strrchr($fichier, '.');

            if (!in_array($extension, $extensions)) {
                $errors[] = 'Vous devez uploader des fichiers de type .png, .jpg, .jpeg, .gif';
            }
            if ($size > $sizeMax) {
                $errors[] = 'Le fichier est trop volumineux';
            }
        }

        if (count($errors) == 0) {
            $id = null;
            $id = createBook($title, $isbn, $publish_at, $writer, $price);
            //enregistrement en BDD
            if ($id != null && isset($fichier)) {
              
                // replace no-allowed-car by -
                $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
                deleteFileIfExiste("id-$id-" . $fichier);
                move_uploaded_file($_FILES['path_image']['tmp_name'], "images/id-$id-" . $fichier);

                update_image_book("id-$id-" . $fichier, $id);
            }
            set_flash('Le livre a été crée', 'success');

            //Redirection vers home
            redirect('?page=home');
        } else {
            save_input_data();
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
        if (isset($errors) && count($errors) != 0) {
            foreach ($errors as $error) {
                echo $error . '<br/>';
            }
        }
        ?>
    </p>
    <form method="POST" enctype="multipart/form-data">
        <label for="title">Titre:</label><br>
        <input type="text" id="title" name="title" value="<?= get_input_data('title');  ?>"><br>

        <label for="isbn">Isbn:</label><br>
        <input type="text" id="isbn" name="isbn" value="<?= get_input_data('isbn');  ?>"><br>

        <label for="publish_at">Date de publication:</label><br>
        <input type="date" id="publish_at" name="publish_at" value="<?= get_input_data('publish_at');  ?>"><br>

        <label for="price">Prix:</label><br>
        <input type="number" id="price" name="price" step="0.01" value="<?= get_input_data('price');  ?>">

        <label for="writer">Ecrivain:</label><br>
        <select id="writer" name="writer">
            <?php
            foreach ($writers as $writer) { ?>
                <option value="<?= $writer->id ?>"><?= strtolower($writer->firstname . ' ' . $writer->lastname); ?></option>
            <?php  }
            ?>
        </select><br>
        <label for="path_image">Pochette:</label><br>
        <input type="file" name="path_image" id="path_image"><br>
        <input class="button" type="submit" name="valider" value="VALIDER" />
    </form>
</section>