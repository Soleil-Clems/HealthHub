<?php
$server = "mysql:host=localhost;dbname=healthhub_db";
$user = 'root';
$psw = 'root';

try {
    $connexion = new PDO($server, $user, $psw);
    $connexion->setAttribute(PDO::ATTR_ERRMODE ,PDO::ERRMODE_EXCEPTION);
    $connexion->exec("SET NAMES utf8");

} catch (PDOException $e) {
    die("Erreur de connexion". $e->getMessage());
}

?>







