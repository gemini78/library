<?php

if (isset($_POST['send'])) {
  if (not_empty(['pseudo'])) {
    extract($_POST);
    $pseudo = e($pseudo);
    $errors = [];

    if (!validateMinLength($pseudo)) {
      $errors[] = "La longueur du champ pseudo doit être supérieur à 2 caractères";
    }

    if (count($errors) == 0) {
      set_session_user($pseudo);
      set_flash("Bienvenue $pseudo", 'success');

      //Redirection vers home    
      redirect("?page=home");
    } else {
      save_input_data();
    }
  } else {
    $errors[] = "Veuillez SVP remplir le champ pseudo !";
  }
} else {
  clear_input_data();
}
//var_dump($_SESSION);
?>
<section class="section-login">
  <h1>Login</h1>
  <p class="errors">
    <?php
    if (isset($errors) && count($errors) != 0) {
      foreach ($errors as $error) {
        echo $error . '<br/>';
      }
    }
    ?>
  </p>
  <div>
    <img src="./images/login/user-login.png" width="250" height="250" alt="user image">
  </div>
  <form method="post">
    <label for="pseudo">Pseudo</label>
    <input type="text" name="pseudo" id="pseudo" value="<?= get_input_data('pseudo');  ?>">
    <input class="button" type="submit" name="send" value="Se connecter">
  </form>

</section>