<?php
    session_start();
?>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/0abcd961be.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&family=Carter+One&family=Courgette&family=Do+Hyeon&family=Fredoka+One&family=Lobster+Two:wght@700&family=Shrikhand&family=Suez+One&display=swap" rel="stylesheet">
</head>

<div id="menu">

    <a href="index.html">Logo Here</a>

    <ul id="menu-list">
        <li><a href="index.php"><i class="fas fa-home"></i> Accueil</a> </li>
        <li><a href="shop.php">Shop</a></li>
        <li><a href="artists.php">Artists</a></li>
        <li><a href="cart.php"><i class="fas fa-shopping-cart"></i> Cart</a></li>
        <?php
            if(isset($_SESSION["useruid"])){
                echo "<li class='login'><a href='profile.php'>Profile</a></li>";
                echo "<li><a href='includes/logout.inc.php'>Logout</a></li>";
            }
            else{
                echo "<li class='login'><a href='login.php'>Log In</a></li>";
                echo "<li><a href='signup.php'>Register</a></li>";
            }   
        ?>
        
    </ul>

</div>