<html>

<head>
    <title>Boosted'Art - Votre Profil</title>
    <link rel="stylesheet" href="style/style-profile.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="script.js"></script>
</head>

<?php
    require_once 'header.php'; ?>

    <body>
    <?php

        try {
         $bdd=new PDO('mysql:host=localhost;dbname=boosted-art;charset=UTF8', 'root','root');
         array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
         }

         catch(Exception $e) {
          die('Erreur :' .$e->getMessage());
        }

    /* S'il n'y a pas de session alors on ne va pas sur cette page (mais ça marche pô encore lolilol)
            if(!isset($_SESSION['id'])){ 
            header('Location: index.php'); 
            exit; 
            }
    */

        $afficher_profil = $bdd->query("SELECT * FROM user");
        $afficher_profil = $afficher_profil->fetch(); 

    ?>
    <ul>
        <div class="banner">
            <div class="infophoto">
                <div class="info">
                    <h2><?= $afficher_profil['name'] ?></h2>
                     <div>Quelques informations sur vous :
                    <ul>
                     <li>Votre mail est : <?= $afficher_profil['mail'] ?></li>
                    <li>Votre numéro de téléphone est : <?= $afficher_profil['phone'] ?></li>
                    </ul>
            </div>
            <div class="photo">
                <img src="jeremy.png" alt="Ma photo"/>
            </div>
        </div>
    </ul>
    <ul> 
        <div class="section">
            <div class="bio">
                Votre bio est : <?= $afficher_profil['bio'] ?>
            </div>
        </div>
    </ul>
    <ul> 
        <div class="section2">
            <div class="infos">
            Votre compte a été crée le : <?= $afficher_profil['creation'] ?>
            <button id="edit"><a href="updateprofile.php">Editer le profil</a></button>
            </div>
        </div>
    </ul>
    </body>
</html>
