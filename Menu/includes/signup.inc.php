<?php

if  (isset($_POST["submit"])){//On vérifie que l'utilisateur soit arrivé sur cette page par la redirection du formulaire d'insciption
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if  (emptyInputSignup($name,$email,$phone,$pwd,$pwdRepeat) !== false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if(invalidPhone($phone) !== false){
        header("location: ../signup.php?error=invaliduid");
        exit();
    }

    if(invalidEmail($email) !== false){
        header("location: ../signup.php?error=invalidemail");
        exit();
    }

    if(pwdMatch($pwd,$pwdRepeat) !== false){
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }

    if(uidExists($conn,$email) !== false){
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $name,$email,$phone,$pwd);

}

else{//Sinon il est redirigé vers la page d'inscription
    header("location: ../signup.php");
    exit();
}
