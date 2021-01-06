<?php
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';
    require_once 'header.php';
    $id_bundle = $_GET['ref'];

   $bundle = getBundleInfos($conn,$ref_bundle);
   var_dump($bundle);

