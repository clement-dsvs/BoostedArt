<?php

function emptyInputUpdate($newname,$newmail,$newphone,$newbio,$newmdp){

    if  (empty($newname) || empty($newmail) || empty($newphone) || empty($newbio) || empty($newmdp)){
        $result = true;
    }
    else{
        $result = false;
    }

    return $result;
}

$requser = $bdd->prepare("SELECT * FROM user WHERE id = ?");
$user = $requser->fetchAll();

$newname = $_POST["newname"];
$newmail = $_POST["newmail"];
$newphone = $_POST["newphone"];
$newbio = $_POST["newbio"];
$newmdp = $_POST["newmdp"];

$update = $bdd->prepare("UPDATE user SET name=?, mail=?, phone=?, bio=?, password=? WHERE id = ?");
$update->execute(array($newname, $newmail, $newphone, $newbio, $newmdp, $_SESSION['id']));
header('Location: profile.php'.$_SESSION['id']);