<?php
require_once 'includes/dbh.inc.php';
require_once 'includes/functions.inc.php';
?>
<link rel="stylesheet" href="style/style-item.css">
<?php
require_once 'header.php';
$id_bundle = $_GET['ref']; //On récupère l'id du bundle passé en référence dans l'adresse de la page
$bundle = getBundleInfos($conn,$id_bundle);
$pictures = scandir('bundle/'. $bundle["id"].'/'); //On recherche dans le dossier correspondant à l'id du bundle les images présentes
?>

<body>
    <div id="container">

        <h3><?php echo($bundle["title"])?></h3>
        <h4>Artistes ayant contribué à ce pack: <?php echo($bundle["id_user"])?></h4>
        <div id="pictures">
            <?php
            foreach($pictures as $pic){
                if($pic != "cover.jpg"){
                    echo("<img src='bundle/{$bundle['id']}/{$pic}' class='pageitem' id='img{$bundle["id"]}' alt=''>");
                }
                else{
                    echo("<div id='couvert'><img src='bundle/{$bundle['id']}/{$pic}' class='pageitem' id='cover' alt=''></div>");echo("<div id='desc'>"."<div id='descrip'>".$bundle["description"]."</div>");
                }
            }
            ?>
        </div>

</div>
</body>
