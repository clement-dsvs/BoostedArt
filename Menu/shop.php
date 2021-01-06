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
                                <a class='title'>{$bundle[2]}</p>
                                <p class='artiste'>{$bundle[4]}</p>
                                <form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
                                        <input type='hidden' name='cmd' value='_s-xclick'>
                                        <input type='hidden' name='hosted_button_id' value='ZTYEUWVB4AUXN'>
                                        <input type='image' src='https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_cart_SM.gif' border='0' name='submit' alt='PayPal, le réflexe sécurité pour payer en ligne'>
                                        <img alt='' border='0' src='https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif' width='1' height='1'>
                                </form>
                        </div>
                ");
        }
        //<button class='buy'><i class='fas fa-shopping-cart'></i></button>ZTYEUWVB4AUXN

?>

</html>