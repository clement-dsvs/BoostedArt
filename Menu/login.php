<head>
    <?php
    require_once 'header.php';
    ?>
    <link rel="stylesheet" href="style/signup.css">
</head>


<body>
    

<div id="login-form-div">

    <section class="signup-form">

        <h2>Se connecter</h2>

        <div class="signup-form-form">

        <form action="includes/login.inc.php" method="post" id="formins">
            <div class="ins">
                <input type="text" name="e-mail" id="mail" placeholder="E-mail">
                <input type="password" name="pwd" id="pwd" placeholder="Password">
            </div>
            <button type="submit" name="submit" id="insc">Log In</button>
        </form>

        </div>

        <?php

            if(isset($_GET["error"])){
                if($_GET["error"]== "emptyinput"){
                    echo"<p>Fill in all fields !</p>";
                }

                if($_GET["error"]== "wronglogin"){
                    echo"<p>Wrong login, try again !</p>";
                }
            }

        ?>

    </section>



</div>

</body>

</html>