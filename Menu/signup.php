<head>
    <?php
    require_once 'header.php';
    ?>
    <link rel="stylesheet" href="style/signup.css">
</head>
<body>
    

<div id="signup-form-div">

    <section class="signup-form">

        <h2>S'inscrire</h2>

        <form action="includes/signup.inc.php" method="post" id="formins">

            <div class="ins">
                <input type="text" name="name" id="pn" placeholder="Prénom Nom" autocomplete="off"><br>
                <input type="text" name="email" id="mail" placeholder="E-mail" autocomplete="off"><br>
                <input type="text" name="phone" id="tel" placeholder="Téléphone" autocomplete="off"><br>
                <input type="password" name="pwd" id="pwd" placeholder="Mot de Passe"><br>
                <input type="password" name="pwdrepeat" id="pwd" placeholder="Répéter Mot de Passe"><br>
            </div>
            <button type="submit" name="submit" id="insc">S'inscrire</button>

        </form>

        <?php

            if(isset($_GET["error"])){

                if($_GET["error"]== "emptyinput"){
                    echo"<p>Fill in all fields !</p>";
                }

                if($_GET["error"]== "invaliduid"){
                    echo"<p>Choose a proper Username !</p>";
                }

                if($_GET["error"]== "invalidemail"){
                    echo"<p>Choose a proper Email !</p>";
                }

                if($_GET["error"]== "passwordsdontmatch"){
                    echo"<p>Password doesn't match !</p>";
                }

                if($_GET["error"]== "stmtfailed"){
                    echo"<p>Something went wrong, try again !</p>";
                }

                if($_GET["error"]== "usernametaken"){
                    echo"<p>Username Already taken !</p>";
                }

                if($_GET["error"]== "none"){
                    echo"<p>You signed up, Congratulations !</p>";
                }
            }

        ?>



    </section>

</div>

</body>

</html>