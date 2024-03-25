<?php
require_once "../includes/db_connexion.php";
require_once "../includes/gestionrdv.php";
$title = "Liste d'attente";
$sql = "SELECT * FROM user WHERE lvl=0";
$req = $connexion->query($sql);
$rows = $req->fetchAll(PDO::FETCH_ASSOC);
$title = "Dashboard";
include_once "../includes/header.php";

?>
<section id="dashboard">


    <h1 class="intro">Prendre un rendez-vous :</h1>
    <div id="rdvform">


        <h1>Choisir un crenneau</h1>

        <form action="" method="post">
            <div class="container">
                <div id="showRdv">
                    <h6>Date choisi : <span id="dateRdv"></span></h6>
                </div>

                <div id="containrdv">

                    <div id="jour">

                        <p>Lundi</p>
                        <p>Mardi</p>
                        <p>Mercredi</p>
                        <p>Jeudi</p>
                        <p>Vendredi</p>
                        <p>Samedi</p>
                        <p>Dimanche</p>
                    </div>
                    <div id='rdv'></div>
                </div>
                <div id="validaterdv">
                    <select class="input-group-text" name="heure" id="list" required>
                        <option value="">Selectionner une heure </option>
                        <option value="08-00">08:00</option>
                        <option value="08-30">08:30</option>
                        <option value="09-00">09:00</option>
                        <option value="10-00">10:00</option>
                        <option value="10-30">10:30</option>
                        <option value="11-00">11:00</option>
                        <option value="11-30">11:30</option>
                    </select>

                    <input type="submit" name='rdv' id="submit" class="btn btnrdv" value="Prendre RDV">

                </div><br>
            </div>
            <?php if (isset($msg)) : ?>
                <p id="error"><?= $msg ?></p>
            <?php endif ?>
        </form>

    </div>
</section>
<script src="../js/index.js"></script>

<?php
require_once "../includes/footer.php";
?>