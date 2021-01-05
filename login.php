<?php

    include_once 'header.php'

?>
<link rel="stylesheet" href="style.css">


<body>
    

<div id="login-form-div">

    <section class="signup-form">

        <h2>Sign Up</h2>

        <div class="signup-form-form">

        <form action="includes/login.inc.php" method="post">

            <input type="text" name="uid"  placeholder="Username/Email">
            <input type="password" name="pwd"  placeholder="Password">
            <button type="submit" name="submit">Log In</button>

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