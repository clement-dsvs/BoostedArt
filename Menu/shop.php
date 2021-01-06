<link rel="stylesheet" href="style/style-bundle.css">

<?php
        require_once 'header.php';
        require_once 'includes/dbh.inc.php';
        require_once 'includes/functions.inc.php';

        $bundles = getItems($conn);

        foreach($bundles as $bundle){
                echo("
                <div class='item' id='item-{$bundle[0]}'>

                <img src='bundle/{$bundle[0]}/cover.jpg' alt='' class='Minia'>
                <p class='title'>{$bundle[2]}</p>
                <p class='Artist'>{$bundle[3]}</p>
                <p class='Desc'>{$bundle[4]}</p>
                        
            </div>
                ");
        }
        //<button class='buy'><i class='fas fa-shopping-cart'></i></button>ZTYEUWVB4AUXN

?>

</html>