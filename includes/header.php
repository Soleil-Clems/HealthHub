<?php
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./img/favicon.png" type="image/x-icon">
    <title><?=$title ?? "Accueuil"?></title> 
    <link rel="stylesheet" href="../dist/css/styles.css">
    <link rel="stylesheet" href="../dist/css/header.css">
    <link rel="stylesheet" href="../dist/css/formulaire.css">
    <link rel="stylesheet" href="../dist/css/dashboard.css">
    <link rel="stylesheet" href="../dist/css/profil.css">
    <link rel="stylesheet" href="../dist/css/rdv.css">
    <link rel="stylesheet" href="../dist/css/index.css">
</head>
<body>
    <div id="divLogo">
        <a href="./index.php"><img src="../img/logo.png" id="logo" alt=""></a>
        <form action="" method="get">
            <input id="search" type="text" name="patient" placeholder="Rechercher un patient" class="input">
            
        </form>
        <div id="profil">profil</div>
    </div>
    <section id="grid">
    <header id="header">
        <nav>
            <ul>
                <li><a href="./index.php">Accueil</a></li>
                <?php if (isset($_SESSION['user'])) {?>
                    <?php if($_SESSION['user']['role']==1){?>
                        <li><a href="../php/dashboard.php">Dashboard</a></li>
                        <li><a href="../php/liste_attente.php">Liste d'attente</a></li>
                        <li><a href="../php/rdv_effectues.php">Rendez-vous effectués</a></li>
                    <?php }?>

                    
                    <li><a href="../php/rdv.php">Prendre rendez-vous</a></li>
                    <li><a href="../php/profil.php">Profil</a></li>
                    <li><a href="../php/logout.php">Deconnexion</a></li>
                <?php }else{?>
                    <li><a href="../php/login.php">Connexion</a></li>
                    <li><a href="../php/signin.php">Inscription</a></li>

                <?php }?>
                <div id="dr"><img src="../img/icon/dr.png" alt=""> </div>
            </ul>
        </nav>
    </header>
    <main id="main" style="background: url('bg.jpg') center center fixed; background-size:cover;">

