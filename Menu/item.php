<?php
    require_once 'includes/dbh.inc.php';
    require_once 'includes/functions.inc.php';
    require_once 'header.php';
    $id_bundle = $_GET['ref'];

   $bundle = getBundleInfos($conn,$id_bundle);
   var_dump($bundle);
   $pictures = scandir('bundle/'. $bundle["id"].'/');
   var_dump($pictures);
?>

<div id="container">
<<<<<<< HEAD

=======
>>>>>>> 85873f14d45884ec5f5c44ef0e7d2b7456924d3b
    <h3><?php echo($bundle["title"])?></h3>
    <h4>Par <?php echo($bundle["id_user"])?></h4>
    <p><?php echo($bundle["description"])?></p>
    <div id="pictures">
        <?php
            foreach($pictures as $pic){
                if($pic != "cover.jpg"){
                    echo("<img src='bundle/{$bundle['id']}/{$pic}' alt=''>");
                }
            }
        ?>
    </div>
            
</div>

