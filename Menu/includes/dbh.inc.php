<?php

$serverName = "localhost";
$cBUsername = "root";
$dBPassWord = "root";
$dBName = "phpproject01";

$conn = mysqli_connect($serverName,$cBUsername,$dBPassWord,$dBName);

if (!$conn){
    die("Connection failed: ". mysqli_connect_error());
}