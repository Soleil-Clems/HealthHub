<?php
@session_start();
require_once "db_connexion.php";

if (isset($_POST["signin"])) {
    if (isset($_POST["nom"], $_POST["prenom"],$_POST["naissance"], $_POST["email"], $_POST["password"], $_POST["confirm_password"])
        && !empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["naissance"]) && !empty($_POST["email"])
        && !empty($_POST["password"]) && !empty($_POST["confirm_password"])
        ){
        $nom = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_SPECIAL_CHARS);
        $prenom = filter_input(INPUT_POST, 'prenom', FILTER_SANITIZE_SPECIAL_CHARS);
        $naissance = filter_input(INPUT_POST, 'naissance', FILTER_SANITIZE_SPECIAL_CHARS);
        $mail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $psw = password_hash($_POST['password'], PASSWORD_ARGON2ID);
        $confirm = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_SPECIAL_CHARS);
        
        if (password_verify($confirm, $psw)) {
            
            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            
                $today =date('Y-m-d');

                if ($today >= $naissance) {
                    $sql = "SELECT * FROM user WHERE email = :email";
                    $req = $connexion->prepare($sql);
                    $req->bindParam('email', $mail, PDO::PARAM_STR);
                    $req->execute();
                    $row = $req->fetchAll(PDO::FETCH_ASSOC);
                    
                    if(sizeof($row)=== 0){
                        $lvl = 0;
                        $sql = "INSERT INTO user(nom, prenom, naissance, email, psw, lvl) VALUES(:nom, :prenom, :naissance, :email, :psw, :lvl)";
                        $req = $connexion->prepare($sql);
                        $req->bindParam('nom', $nom, PDO::PARAM_STR);
                        $req->bindParam('prenom', $prenom, PDO::PARAM_STR);
                        $req->bindParam('naissance', $naissance, PDO::PARAM_STR);
                        $req->bindParam('email', $mail, PDO::PARAM_STR);
                        $req->bindParam('psw', $psw, PDO::PARAM_STR);
                        $req->bindParam('lvl', $lvl, PDO::PARAM_INT);
    
                        $req->execute();
                        header("Location: login.php");
                    }else{
                        $msg = "Un compte est deja associé a ce mail";
                    }
                    
                    // header("Location: login.php");

                }else{
                    $msg = 'Vous ne pouvez pas avoir une date de naissance dans le futur';
                }
            }else{
                $msg = "Entrez une adresse mail valide";
            }

        }else{
            $msg ='Veuillez saisir des mots de passes identique';
        }

    } else {
        $msg = "Veuillez remplir tous les champs";
    }
    
}


if (isset($_POST["login"])) {
    if (isset($_POST["email"], $_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
        
        $mail = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_SPECIAL_CHARS);
        $psw = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);
        
        $sql = "SELECT * FROM user WHERE email = :email";
        $req = $connexion->prepare($sql);
        $req->bindParam('email', $mail, PDO::PARAM_STR);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);

        if (password_verify($psw, $row['psw'])) {
            
            if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['user'] = [
                    "id"=> $row['id'],
                    "nom"=> $row['nom'],
                    "prenom"=> $row['prenom'],
                    "naissance"=> $row['naissance'],
                    "email"=> $row['email'],
                    "role"=> $row['lvl'],
                ];

                header("Location: profil.php");
                
            }else{
                    $msg = "Entrez une adresse mail valide";
            }

        }else{
            $msg ='Adresse mail ou mot de passe incorrect';
        }

    } else {
        $msg = "Veuillez remplir tous les champs";
    }
    
}















?>