<?php

if (isset($_POST['send'])) {
  if (not_empty(['pseudo'])) {
    extract($_POST);
    $pseudo = e($pseudo);
    $errors = [];

    set_session_user($pseudo);
    set_flash("Bienvenue $pseudo", 'success');
    
    //Redirection vers home    
    redirect("?page=home");

  } else {
    $errors[] = "Veuillez SVP remplir le champ pseudo !";
  }
}

?>
<section class="section-login">
  <h1>Login</h1>

  <div>
    <img src="./images/login/user-login.png" width="250" height="250" alt="user image">
  </div>
  <form method="post">
    <label for="pseudo">Pseudo</label>
    <input type="text" name="pseudo" id="pseudo" placeholder="votre pseudo">
    <input type="submit" name="send" value="Se connecter">
  </form>

</section>