<?php
    require_once 'header.php'; 
    if(!isset($_SESSION["user-name"])){
        header('location: login.php');
        exit();
    }
    
?>

    <body>

    <?php

try {
    $bdd=new PDO('mysql:host=localhost;dbname=boosted-art;charset=UTF8', 'root','root');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    }

    catch(Exception $e) {
    die('Erreur :' .$e->getMessage());
    }

        $afficher_profil = $bdd->query("SELECT * FROM user WHERE id={$_SESSION['user-id']}");
        $afficher_profil = $afficher_profil->fetch(); 

    ?>

        <h2>Voici le profil de <?= $afficher_profil['name'] ?></h2>
        <div>Quelques informations sur vous : </div>

        <ul>
            <li>Votre mail est : <?= $afficher_profil['mail'] ?></li>
            <li>Votre numéro de téléphone est : <?= $afficher_profil['phone'] ?></li>
            <li>Votre bio est : <?= $afficher_profil['bio'] ?></li>
            <li>Votre compte a été crée le : <?= $afficher_profil['creation'] ?></li>
            <li>Il s'agit d'un : <?php if ($afficher_profil['id_rank'] == 2){ echo"Artiste";} else {echo"utilisateur";} ?></li>
        </ul>
        <button id="edit"><a href="updateprofile.php">Editer le profil</a></button>

    <?php
        if($afficher_profil["id_rank"] != 2){
            echo("<form action='includes/becomeArtist.inc.php' method='post'>
        <input type='hidden' name='user_id' value='{$_SESSION['user-id']}'>
        <button type='submit' name='submit'>Devenir Un artiste !</button>   
    </form>");
        }
    ?>

   

    </body>
</html>
