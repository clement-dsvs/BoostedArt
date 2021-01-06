<?php
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';
    require_once 'header.php';
    $id_bundle = $_GET['ref'];

    $sql = "SELECT * FROM bundle WHERE id = {$id_bundle}";

