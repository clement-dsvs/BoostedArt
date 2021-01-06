<html>
<?php
    require_once 'header.php'; ?>
    <head>
        <title>Mon profil</title>
    </head>

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

        <h2>Voici le profil de <?= $afficher_profil['name'] ?></h2>
        <div>Quelques informations sur vous : </div>

        <ul>
            <li>Votre mail est : <?= $afficher_profil['mail'] ?></li>
            <li>Votre numéro de téléphone est : <?= $afficher_profil['phone'] ?></li>
            <li>Votre bio est : <?= $afficher_profil['bio'] ?></li>
            <li>Votre compte a été crée le : <?= $afficher_profil['creation'] ?></li>
        </ul>
        <button id="edit"><a href="updateprofile.php">Editer le profil</a></button>

    </body>
</html>
