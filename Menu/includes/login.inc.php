<?php
//On vérifie si l'utilisateur est bien arrivé sur cette page par la redirection du formulaire de connexion
if (isset($_POST["submit"])){

    $mail = $_POST["e-mail"];
    $pwd = $_POST["pwd"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if  (emptyInputLogin($mail,$pwd) !== false){
        header("location: ../login.php?error=emptyinput");
        exit();
    }

    loginUser($conn, $mail,$pwd);

}

else {//Sinon il est renvoyé sur la page de connexion
    header("location: ../login.php");
        exit();

}
