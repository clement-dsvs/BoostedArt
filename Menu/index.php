                    <!--session initialization (login.php)-->
<?php
    session_start();
?>

                    <!--html parameter -->
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <!--page title-->
    <title>Accueil Boosted'art</title>
                    <!--script and style links-->
    <link rel="stylesheet" href="style/style-accueil.css">
    <script src="https://kit.fontawesome.com/0abcd961be.js" crossorigin="anonymous"></script>
    <link rel="icon" href="Logo/favicon.png"  type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Carter+One&family=Courgette&family=Do+Hyeon&family=Fredoka+One&family=Lobster+Two:wght@700&family=Shrikhand&family=Suez+One&display=swap" rel="stylesheet">
</head>
                    <!--limit mouse use (selection of items)-->
<body onmousedown="return false">
                    <!--superior menu with dynamic display-->
<div id="logMenuAccueil">
    <ul>
    <?php
                    //if connected display
            if(isset($_SESSION["user-name"])){
                echo("<li><div id='logMenuAccueil1'><a href='profile.php'>Profil</a></div></li>");
                echo("<li><div id='logMenuAccueil2'><a href='includes/logout.inc.php'>Déconnexion</a></div></li>");
            
                }
                    //else if not connected display
            else{
                echo("<li><div id='logMenuAccueil1'><a href='login.php'>Se connecter</a></div></li>");
                echo("<li><div id='logMenuAccueil2'><a href='signup.php'>S'enregistrer</a></div></li>");
            }   
        ?>    
    </ul>
</div>
                    <!--central main logo integration with suntitle and div use in css/style-accueil-->
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

                    <!--redirection buttons integration-->
<div id="secondFont">
    <br>
    <div id="redirection">
        <ul>
                    <!--their is several div , the aim is to rotate one to create a form, and a second to rotate text and logo in opposite  so it seems straight-->
            <li><a id="redirection1" href="shop.php">
                    <div id="redirection1Text"><img src="Logo/shopping-cart.png" alt="Chariot"></div></a>
                </a></li>
            <li><a id="redirection2" href="profile.php">
                    <div id="redirection2Text"><img src="Logo/user.png" alt="bonhomme"></div></a>
                </a></li>
            <li><a id="redirection3" href="contact.php">
                    <div id="redirection3Text"><img src="Logo/help.png" alt="question"></div></a>
                </a></li>
        </ul>
    </div>
                    <!--legend of redirection buttons-->
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
