<link rel="stylesheet" href="style/style-bundle.css">

<?php
        require_once 'header.php';
        require_once 'includes/dbh.inc.php';
        require_once 'includes/functions.inc.php';

        $bundles = getItems($conn);

        foreach($bundles as $bundle){
                echo("
                        <div class='item' id='item-{$bundle[0]}'>

                                <img src='bundle/{$bundle[0]}/cover.jpg' alt='' class='vitrine'>
                                <p class='title'>{$bundle[2]}</p>
                                <p class='artiste'>{$bundle[4]}</p>

                                <div class='buy-container'>
                                        <button class='buy'><i class='fas fa-shopping-cart'></i></button>
                                        <section class='quantity'>
                                        <button class='minus' onclick='minus()'>-</button>
                                        <input type='text' class='number' value=1>
                                        <button class='plus'>+</button>
                                         </section>
                                </div>
                        </div>
                ");
        }
?>

</html>