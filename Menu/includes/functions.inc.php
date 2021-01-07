<?php

function emptyInputSignup($name,$email,$username,$pwd,$pwdRepeat){

    if  (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function invalidPhone($phone){

    if  (!preg_match("/^[0-9]*$/", $phone)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function invalidEmail($email){

    if  (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function pwdMatch($pwdRepeat,$pwd){
    
    if  ($pwd !== $pwdRepeat){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

function uidExists($conn, $username, $email){

    $sql = "SELECT * FROM user WHERE name = ? OR mail = ?;";
    $stmt = mysqli_stmt_init($conn);

    if  (!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    
    mysqli_stmt_bind_param($stmt, "ss", $username, $email);

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

    header("location: ../signup.php?error=none");
    exit();

}

function emptyInputLogin($mail,$pwd){

    if  (empty($mail) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

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
        header("location: ../shop.php");
    }

}

function getItems($conn){

    $sql = "SELECT * FROM bundle;";
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