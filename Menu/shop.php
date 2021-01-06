<link rel="stylesheet" href="style/style-bundle.css">

<?php
        require_once 'header.php';
        require_once 'includes/dbh.inc.php';
        require_once 'includes/functions.inc.php';

        $bundles = getItems($conn);

        foreach($bundles as $bundle){
                echo("
                <a href='item.php?ref={$bundle[0]}' class='item' id='item-{$bundle[0]}'>
                        <img src='bundle/{$bundle[0]}/cover.jpg' alt='' class='Minia'>
                        <p class='title'>{$bundle[2]}</p>
                        <p class='Artist'>{$bundle[4]}</p>
                        <p class='Desc'>{$bundle[3]}</p>      
                </a>
                ");
        }
?>

</html>