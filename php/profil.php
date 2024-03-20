<?php
session_start();
$title = "Profil";
include_once "../includes/header.php";
include_once "../includes/profil_info.php";

?>

<div id="profDiv">

    <div class="usercard eachcard">
        <div class="userinf">
            <h2 class="sujet">Profil</h2>
            <div class="profil-org">

                <div id="inputimg">
                    <img src="../img/icon/user-pen.png" alt="">
                    <a href="profil.php?id=<?= $_SESSION['user']['id'] ?>" class="add">+</a>
                </div>
                <div class="session-profil">

                    <h1 class="profil-user-name">Profil de <?= $_SESSION['user']['nom'] ?></h1>
                    <p>Prenom : <span class="no-imp"><?= $_SESSION['user']['prenom'] ?></span> </p>
                    <p>Email : <span class="no-imp"><?= $_SESSION['user']['email'] ?></span></p>
                    <p>Date de Naissance :<span class="no-imp"> <?= $_SESSION['user']['naissance'] ?></span></p>
                </div>
            </div>
        </div>
        <div class="usercardinf">
            <h2 class="sujet">Prochain rendez-vous</h2>
            <?php foreach ($rows_next as $i => $row) { ?>
                <p>
                    <?= $i + 1, "-RDV: ", $row['date_rdv'], " a ", $row['heure_rdv'] ?>
                </p>
            <?php } ?>
            <h2 class="sujet">Rendez vous passé avec succes</h2>
            <?php foreach ($rows_past as $i => $row) { ?>
                <p>
                    <?= $i + 1, "-RDV: ", $row['date_rdv'], " a ", $row['heure_rdv'] ?>
                </p>
            <?php } ?>
        </div>
        <?php  foreach ($rows_fact as $i => $row) { ?>
           
                <div class="usercardinf">
                    <h2 class="sujet"> <?= $i?>-Factures  <?= $row['id_dossier'] ?></h2>
                    <p> Maladie  : <?= $row["maladie"]?></p>
                    <p>Cause : <?= $row["cause"]?></p>
                    <p>Prescription : <?= $row["prescription"]?></p>
                    <p>Montant : <?= $row["montant"]?></p>
                    <p>Date : <?= $row['date_edition'], " a ", $row['heure_edition']?></p>
                    <p></p>
                </div>
         <?php   }?>

    </div>
    <div class="eachcard card3">
        <div class="hospitalinf">
            <h2 class="sujet">Avez vous des questions particulieres?</h2>
            <div class="contact">
                <p>Contact: </p>
                <p> cc@gmail.hopital.fr</p>
            </div>
            <input type="button" value="Joindre" class="btn1 btn">
        </div>
    </div>
</div>

<?php
include_once "../includes/footer.php"

?>