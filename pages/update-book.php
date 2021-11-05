<?php
include('../filters/auth_filter.php');

if ($_GET['id'] != 0) {
    $book = get_book($_GET['id']);
}
if (!$book) {
    set_flash('Livre inconnu', 'danger');

    redirect('?page=error');
}
$writers = get_writers();

if (isset($_POST['valider'])) {
   
    if (not_empty(['title', 'isbn', 'publish_at', 'writer', 'price'])) {
        extract($_POST);
        $errors = [];
        
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
            //update BDD
            update_book($title, $isbn, $publish_at, $writer, $price, $_GET['id']);
            
            //store into BDD
            if($book->id != null && isset($fichier)) {
                // replace no-allowed-car by -
                $fichier = preg_replace('/([^.a-z0-9]+)/i','-',$fichier);
                move_uploaded_file($_FILES['path_image']['tmp_name'],"images/id-$book->id-".$fichier);
                
                update_image_book("id-$book->id-".$fichier,$book->id);
            }

            set_flash('Le livre a été mis à jour', 'success');

            //Redirection vers home
            header('Location: ?page=home');
        }
    } else {
        $errors[] = "Veuillez SVP remplir tous les champs !";
    }
}
?>
<section class="section-update-book">

    <h1>Modifier un livre</h1>

    <p class="errors">
        <?php
        if (isset($errors) && count($errors) != 0) {
            foreach ($errors as $error) {
                echo $error . '<br/>';
            }
        }
        ?>
    </p>
    <div class="section-update-book__img"><img src="./images/<?= $book->path_image; ?>" width="200" height="250" alt="Image du livre"></div>
    <form method="POST" enctype="multipart/form-data">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" value="<?= $book->title;  ?>"><br>

        <label for="isbn">Isbn:</label><br>
        <input type="text" id="isbn" name="isbn" value="<?= $book->isbn ?>"><br>

        <label for="publish_at">Date de publication:</label><br>
        <input type="date" id="publish_at" name="publish_at" value="<?= $book->publish_at ?>"><br>

        <label for="writer">Ecrivain:</label><br>
        <select id="writer" name="writer">
            <?php
            foreach ($writers as $writer) { ?>
                <option value="<?= $writer->id ?>" <?php if ($writer->id == $book->writer_id) echo 'selected'; ?>><?= strtolower($writer->firstname . ' ' . $writer->lastname); ?></option>
            <?php  }
            ?>
        </select><br>

        <label for="path_image">Pochette:</label><br>
        <input type="file" name="path_image" id="path_image"><br>

        <label for="price">Prix:</label><br>
        <input type="number" id="price" name="price" step="0.01" value="<?= $book->price ?>">

        <input type="submit" name="valider" value="VALIDER" />
    </form>
</section>