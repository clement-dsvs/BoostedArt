<?php
//Initialisation de la connexion à la base de données SQL
$serverName = "localhost";
$cBUsername = "root";
$dBPassWord = "root";
$dBName = "boosted-art";

$conn = mysqli_connect($serverName,$cBUsername,$dBPassWord,$dBName);

if (!$conn){
    die("Connection failed: ". mysqli_connect_error());
}
