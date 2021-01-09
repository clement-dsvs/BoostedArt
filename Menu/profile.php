<head>
<?php
    require_once 'header.php'; 
    if(!isset($_SESSION["user-name"])){
        header('location: login.php');
        exit();
    }
    
?>
    <title>BVotre Profil</title>
    <link rel="stylesheet" href="style/style-profile.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="script.js"></script>
</head>


    <body>

    <?php

try {
    $bdd=new PDO('mysql:host=localhost;dbname=boosted-art;charset=UTF8', 'root','');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    }

    catch(Exception $e) {
    die('Erreur :' .$e->getMessage());
    }

        $afficher_profil = $bdd->query("SELECT * FROM user WHERE id={$_SESSION['user-id']}");
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
                    <button id="edit"><a href="updateprofile.php">Editer le profil</a></button>
                    <?php
                    if($afficher_profil["id_rank"] != 2){
                    echo("<form action='includes/becomeArtist.inc.php' method='post'>
                    <input type='hidden' name='user_id' value='{$_SESSION['user-id']}'>
                    <button type='submit' name='submit'>Devenir Un artiste !</button>   
                    </form>");
                    }
                    ?>
            </div>
            <div class="photo">
                <img src="" alt="Ma photo"/>
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
            <li>Il s'agit d'un : <?php if ($afficher_profil['id_rank'] == 2){ echo"Artiste";} else {echo"utilisateur";} ?></li>
            </div>
        </div>
    </ul>

</body>
