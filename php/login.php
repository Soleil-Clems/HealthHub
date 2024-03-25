<?php
require_once "../includes/db_connexion.php";
require_once "../includes/authentification.php";
$title = "Connexion";
include_once "../includes/header.php";

?>



<section id="form-section">

    <div class="container py-5" id="form">
        <h2>Connexion</h2>
        <form action="" method="post">

            <div class="input-group my-2">
                <label for="mail" class="label">Email</label><br>
                <input type="email" class='input' placeholder="Saisir votre adresse mail" name="email" id="mail"><br>
            </div>
            <div class="input-group my-2">
                <label for="psw1" class="label">Password</label><br>
                <input type="password" placeholder="Saisir un mot de passe" name="password" class="input" id="psw1"><br>
            </div>
            <?php if (isset($msg)) : ?>
                <p id="error"><?= $msg ?></p>
            <?php endif ?>
            <input type="submit" name="login" value="Login" class="btn  btn-primary">
        </form>
    </div>
    </div>


</section>

<?php
include_once "../includes/footer.php"

?>