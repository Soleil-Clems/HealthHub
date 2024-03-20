<?php
@session_start();
require_once "db_connexion.php";


if (isset($_POST['rdv'])) {

    if (isset($_POST['heure'], $_POST['creneau']) && !empty($_POST['heure']) && !empty($_POST['creneau'])) {

        $heure = filter_var($_POST['heure'], FILTER_SANITIZE_SPECIAL_CHARS);
        $jour = filter_var($_POST['creneau'], FILTER_SANITIZE_SPECIAL_CHARS);


        $sql = "SELECT * FROM liste_attente WHERE date_rdv =:creneau AND heure_rdv=:heure_rdv";
        $req = $connexion->prepare($sql);
        $req->bindParam("creneau", $jour, PDO::PARAM_STR);
        $req->bindParam("heure_rdv", $heure, PDO::PARAM_STR);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
        if ($row === false) {
            $sql = "INSERT INTO liste_attente(id_patient, nom, prenom, email, date_rdv, heure_rdv) VALUES(:id_patient, :nom, :prenom, :email, :date_rdv, :heure_rdv) ";
            $req = $connexion->prepare($sql);
            $req->bindParam("id_patient", $_SESSION['user']['id'], PDO::PARAM_INT);
            $req->bindParam("nom", $_SESSION['user']['nom'], PDO::PARAM_STR);
            $req->bindParam("prenom", $_SESSION['user']['prenom'], PDO::PARAM_STR);
            $req->bindParam("email", $_SESSION['user']['email'], PDO::PARAM_STR_CHAR);
            $req->bindParam("date_rdv", $jour, PDO::PARAM_STR);
            $req->bindParam("heure_rdv", $heure, PDO::PARAM_STR);

            $req->execute();
            header("Location: profil.php");
        } else {
            $msg ='Choisissez un autre creneau celui-ci est deja pris';
        }
    } else {
        $msg = "Vous devez choisir une creneau valide";
    }
}

if (isset($_POST['diagnostique'])) {
    if (isset($_POST['maladie'], $_POST['cause'], $_POST['prescription'], $_POST['montant']) && !empty($_POST['maladie']) && !empty($_POST['cause']) && !empty($_POST['prescription']) && !empty($_POST['montant'])) {
        date_default_timezone_set("Africa/Bangui");
        $id_patient = filter_var($_GET['editer'], FILTER_SANITIZE_NUMBER_INT);
        $maladie = filter_var($_POST['maladie'], FILTER_SANITIZE_SPECIAL_CHARS);
        $cause = filter_var($_POST['cause'], FILTER_SANITIZE_SPECIAL_CHARS);
        $prescription = filter_var($_POST['prescription'], FILTER_SANITIZE_SPECIAL_CHARS);
        $montant = filter_var($_POST['montant'], FILTER_SANITIZE_NUMBER_FLOAT);
        $currentHours = date("H:i");
        $currentDate = date("Y-m-d");

        if ($montant >= 0) {
            $sql = "INSERT INTO dossier(id_patient, maladie, cause, prescription, montant, date_edition, heure_edition) VALUES(:id_patient, :maladie, :cause, :prescription, :montant, :date_edition, :heure_edition) ";
            $req = $connexion->prepare($sql);
            $req->bindParam("id_patient", $id_patient, PDO::PARAM_INT);
            $req->bindParam("maladie", $maladie, PDO::PARAM_STR);
            $req->bindParam("cause", $cause, PDO::PARAM_STR);
            $req->bindParam("prescription", $prescription, PDO::PARAM_STR);
            $req->bindParam("montant", $montant, PDO::PARAM_INT);
            $req->bindParam("date_edition", $currentDate, PDO::PARAM_STR);
            $req->bindParam("heure_edition", $currentHours, PDO::PARAM_STR);
            $req->execute();


            $sql = "SELECT * FROM liste_attente WHERE id_attente=:id_attente";
            $req = $connexion->prepare($sql);
            $req->bindParam("id_attente", $_GET['attente'], PDO::PARAM_INT);
            $req->execute();
            $row = $req->fetch(PDO::FETCH_ASSOC);


            $sql = "INSERT INTO liste_succes(id_patient, nom, prenom, email, date_rdv, heure_rdv) VALUES(:id_patient, :nom, :prenom, :email, :date_rdv, :heure_rdv)";
            $req = $connexion->prepare($sql);
            $req->bindParam("id_patient", $id_patient, PDO::PARAM_INT);
            $req->bindParam("nom", $row['nom'], PDO::PARAM_STR);
            $req->bindParam("prenom", $row['prenom'], PDO::PARAM_STR);
            $req->bindParam("email", $row['email'], PDO::PARAM_STR);
            $req->bindParam("date_rdv", $currentDate, PDO::PARAM_STR);
            $req->bindParam("heure_rdv", $currentHours, PDO::PARAM_STR);
            $req->execute();

            $sql = "DELETE FROM liste_attente WHERE id_attente=:id_attente";
            $req = $connexion->prepare($sql);
            $req->bindParam("id_attente", $_GET['attente'], PDO::PARAM_INT);
            $req->execute();

            header("Location: rdv_effectues.php");
        } else {
            $msg = "Le montant doit etre positif";
        }
    } else {
        $msg = "Veuillez remplir tous les champs";
    }
}

if (isset($_GET['annuler'])) {
    
    $sql = "DELETE FROM liste_attente WHERE id_attente=:id_attente";
            $req = $connexion->prepare($sql);
            $req->bindParam("id_attente", $_GET['annuler'], PDO::PARAM_INT);
            $req->execute();

            header("Location: liste_attente.php");
}
