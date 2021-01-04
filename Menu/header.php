<?php
    session_start();
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="style/style-header.css">
    <script src="https://kit.fontawesome.com/0abcd961be.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Carter+One&family=Courgette&family=Do+Hyeon&family=Fredoka+One&family=Lobster+Two:wght@700&family=Shrikhand&family=Suez+One&display=swap" rel="stylesheet">
</head>

<header> 
    <div id= "Titre">Boosted Art </div>
    <nav id= "Menu">
        <ul>
            <li><a href="index.php"> Accueil </a></li>
            <li><a href="shop.php"> Boutique </a></li>
            <li><a href="artists.php"> Artistes </a></li>
            <li><a href="contact.php"> Contact </a></li>
            <li>    <?php
            if(isset($_SESSION["useruid"])){
                echo "<li><a href='profile.php'>Profile</a></li>";
                echo "<li><a href='includes/logout.inc.php'>Logout</a></li>";
            }
            else{
                echo "<li><a href='login.php'>Log In</a></li>";
                echo "<li><a href='signup.php'>Register</a></li>";
            }   
        ?></li>
        </ul>
    </nav>
</header>

