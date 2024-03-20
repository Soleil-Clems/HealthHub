<?php
require_once "../includes/db_connexion.php";
require_once "../includes/authentification.php";
$title = "Inscription";
include_once "../includes/header.php";

?>


<section id="form-section">

    <div class="container py-5" id="form">
        <h2 id="insc">Inscription</h2>
        <form action="" method="post">
            <div class="input-group my-2">
                <label for="nom" class="label">Nom</label><br>
                <input type="text" class="input" placeholder="Entrez votre Nom" name="nom" id="nom"><br>
            </div>
            <div class="input-group my-2">
                <label for="prenom" class="label">Prénom</label><br>
                <input type="text" class="input" placeholder="Entrez votre Prenom" name="prenom" id="prenom"><br>
            </div>
            <div class="input-group my-2">
                <label for="date" class="label">Date de naissance</label><br>
                <input type="date" class="input" name="naissance" id="date"><br>
            </div>
            <div class="input-group my-2">
                <label for="mail" class="label">Email</label><br>
                <input type="email" class='input' placeholder="Saisir votre adresse mail" name="email" id="mail"><br>
            </div>
            <div class="input-group my-2">
                <label for="psw1" class="label">Password</label><br>
                <input type="password" placeholder="Saisir un mot de passe" name="password" class="input" id="psw1"><br>
            </div>
            <div class="input-group my-2">
                <label for="psw2" class="label">Confirmation</label><br>
                <input type="password" class="input" placeholder="Confirmer le mot de passe" name="confirm_password" id="psw2"><br>
            </div>
            <?php if (isset($msg)) : ?>
                <p id="error"><?= $msg ?></p>
                <?php endif ?>
                <input type="submit" name="signin" value="Sign In" class="btn  btn-primary">
        </form>
    </div>
    </div>


</section>






<?php
include_once "../includes/footer.php"

?>