<?php
//Fonction vérifiant que les entrées du formulaire d'inscription sont bien remplies
function emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat){

    if  (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}
//Fonction verifiant que le téléphone rentré dans le formulaire ne contient bien que des chiffres
function invalidPhone($phone){

    if  (!preg_match("/^[0-9]*$/", $phone)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}
//Fonction verifiant que l'e-mail rentré soit de la bonne forme
function invalidEmail($email){

    if  (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}
//Fonction verifiant que les mots de passes rentrés dans le formulaire d'inscription sont identiques
function pwdMatch($pwdRepeat,$pwd){
    
    if  ($pwd !== $pwdRepeat){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}
//fonction verifiant si un utilisateur donné existe dans la base de donnée, si il existe il est retourné sous forme d'array
function uidExists($conn, $email){

    $sql = "SELECT * FROM user WHERE mail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if  (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "s",$email);

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
   
}
//fonction créant un utilisateur dans la base de données
function createUser($conn, $name,$email,$phone,$pwd){
    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
    $sql = "INSERT INTO user (name,mail,phone,password) VALUES ('{$name}', '{$email}', '{$phone}', '{$hashedPwd}') ;";
    $stmt = mysqli_stmt_init($conn);

    if  (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtSignupFailed");
        exit();
    }
    
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../login.php?justSignedUp");
    exit();

}
//Fonction verifiant que tous les champs du formulaire de connexion soient bien remplis
function emptyInputLogin($mail,$pwd){

    if  (empty($mail) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}
//fonction connectant un utilisateur si l'e-mail correspond à un utilisateur dans la base et si le mdp est correct
function loginUser($conn, $mail, $pwd){

    $uidExists = uidExists($conn, $mail, $mail);

    if($uidExists === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["password"];

    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd === false){
        header("location: ../login.php?error=wronglogin");
        exit();
    }
    else if ($checkPwd === true){
        session_start();
        $_SESSION["user-id"] = $uidExists["id"];
        $_SESSION["user-name"] = $uidExists["name"];
        $_SESSION["user-mail"] = $uidExists["mail"];
        $_SESSION["user-bio"] = $uidExists["bio"];
        $_SESSION["user-phone"] = $uidExists["phone"];
        header("location: ../shop.php");
    }

}
//fonction retournant tous les objets du magasin
function getItems($conn){

    $sql = "SELECT bundle.*,user.name FROM bundle INNER JOIN `user` ON bundle.id_user=user.id;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header('location: ./index.php?error=stmtShopFailed');
        exit();
    }

    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $rows = mysqli_fetch_all($resultData);

    mysqli_stmt_close($stmt);

    return $rows;

}
//fonction retournant les informations d'un objet precis
function getBundleInfos($conn,$ref_bundle){
    $sql = "SELECT * FROM bundle WHERE id = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt,$sql)){
        header('location: ./shop.php?error=stmtBundleFailed');
        exit();
    }
    mysqli_stmt_bind_param($stmt,"i",$ref_bundle);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    $bundle = mysqli_fetch_assoc($resultData);
    mysqli_stmt_close($stmt);
    return $bundle;

}
