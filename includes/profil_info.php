<?php

require_once "db_connexion.php";

$id =$_SESSION['user']['id'];
$sql = "SELECT * FROM liste_attente WHERE id_patient=:id_patient ORDER BY date_rdv ASC";
$req = $connexion->prepare($sql);
$req->bindParam("id_patient", $id, PDO::PARAM_INT);
$req->execute();
$rows_next = $req->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM liste_succes WHERE id_patient=:id_patient ORDER BY date_rdv ASC";
$req = $connexion->prepare($sql);
$req->bindParam("id_patient", $id, PDO::PARAM_INT);
$req->execute();
$rows_past = $req->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM dossier WHERE id_patient=:id_patient ";
$req = $connexion->prepare($sql);
$req->bindParam("id_patient", $id, PDO::PARAM_INT);
$req->execute();
$rows_fact = $req->fetchAll(PDO::FETCH_ASSOC);