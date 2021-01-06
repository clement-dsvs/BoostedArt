<?php
    session_start();
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Boosted'art</title>
    <link rel="stylesheet" href="style/style-accueil.css">
    <script src="https://kit.fontawesome.com/0abcd961be.js" crossorigin="anonymous"></script>
    <link rel="icon" href="Logo/favicon.png"  type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Carter+One&family=Courgette&family=Do+Hyeon&family=Fredoka+One&family=Lobster+Two:wght@700&family=Shrikhand&family=Suez+One&display=swap" rel="stylesheet">
</head>

<body>
    
</body>
<div id="logMenuAccueil">
    <ul>
    <?php
            if(isset($_SESSION["user-name"])){
                echo("<li><div id='logMenuAccueil1'><a href='profile.php'>Profil</a></div></li>");
                echo("<li><div id='logMenuAccueil2'><a href='includes/logout.inc.php'>Déconnexion</a></div></li>");
            
                }
            else{
                echo("<li><div id='logMenuAccueil1'><a href='login.php'>Se connecter</a></div></li>");
                echo("<li><div id='logMenuAccueil2'><a href='signup.php'>S'enregistrer</a></div></li>");
            }   
        ?>    
    </ul>
</div>

<div id="logoAccueil">
<h1><img src="Logo/LogoBoostedArt.png" alt="Boosted ART"></h1>
</div>
<br>
<div id="traitMenu"></div>

<div id ="textBienvenue">
    <div id="textBienvenue1"> <p>Bienvenue sur Boosted'ART ! </p> </div>
    <br>
    <p> Votre site d'achat de bundles en ligne.</p>

    <br>
</div>

<div id="secondFont">
    <br>
    <div id="redirection">
        <ul>
            <li><div id="redirection1">
                    <div id="redirection1Text"><a href="shop.php"><img src="Logo/shopping-cart.png" alt="Chariot"></a></div> 
                </div></li>
            <li><div id="redirection2">
                    <div id="redirection2Text"><a href="profile.php"><img src="Logo/user.png" alt="bonhomme"></a></div>
                </div></li>
            <li><div id="redirection3">
                    <div id="redirection3Text"><a href="contact.php"><img src="Logo/help.png" alt="question"></a></div>
                </div></li>
        </ul>
    </div>
    <div id="intituleRedirection">
        <ul>
            <li>Accéder à la boutique</li>
            <li>Accéder à votre espace</li>
            <li>Un avis ? Une question ?</li> 
        </ul>
    </div>
    <br>
</div>
</body>
</html>
