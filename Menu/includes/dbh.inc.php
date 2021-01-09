<?php

$serverName = "localhost";
$cBUsername = "root";
$dBPassWord = "";
$dBName = "boosted-art";

$conn = mysqli_connect($serverName,$cBUsername,$dBPassWord,$dBName);

if (!$conn){
    die("Connection failed: ". mysqli_connect_error());
}