<?php
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';
    require_once 'header.php';
    $id_bundle = $_GET['ref'];

   $bundle = getBundleInfos($conn,$id_bundle);
   var_dump($bundle);
?>

<div id="container">

    <h3><?php echo($bundle["title"])?></h3>
    <h4>Par <?php echo($bundle["id_user"])?></h4>
    <p><?php echo($bundle["description"])?></p>

</div>

