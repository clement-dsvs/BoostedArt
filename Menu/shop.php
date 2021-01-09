<link rel="stylesheet" href="style/style-bundle.css">

<?php
        require_once 'header.php';
        require_once 'includes/dbh.inc.php';
        require_once 'includes/functions.inc.php';

        $bundles = getItems($conn);
        echo("<div id='container-shop'>");
        if(isset($_SESSION["user-name"])){
                foreach($bundles as $bundle){
                echo("
                <a href='item.php?ref={$bundle[0]}' class='item' id='item-{$bundle[0]}'>
                        <img src='bundle/{$bundle[0]}/cover.jpg' alt='' class='Minia'>
                        <p class='title'>{$bundle[2]}</p>
                        <p class='Artist'>{$bundle[8]}</p>
                        <p class='Desc'>{$bundle[3]}</p>
                        <form target='paypal' action='https://www.paypal.com/cgi-bin/webscr' method='post'>
                                <input type='hidden' name='cmd' value='_s-xclick'>
                                <input type='hidden' name='hosted_button_id' value='{$bundle[1]}'>
                                <input type='image' src='https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_cart_SM.gif' border='0' name='submit' alt='PayPal, le réflexe sécurité pour payer en ligne'>
                                <img alt='' border='0' src='https://www.paypalobjects.com/fr_FR/i/scr/pixel.gif' width='1' height='1'>
                                </form>
                </a>
                ");
        }
        } else {
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
        }
        
?>
</div>

</html>