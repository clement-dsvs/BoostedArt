<head>
<?php
    require_once 'header.php'; 
    if(!isset($_SESSION["user-name"])){
        header('location: login.php');
        exit();
    }
    
?>
    <title>Modifier votre Profil</title>
    <link rel="stylesheet" href="style/style-updateprofile.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="script.js"></script>
</head>

    <body>      

    <?php 
    
    try {
    $bdd=new PDO('mysql:host=localhost;dbname=boosted-art;charset=UTF8', 'root','root');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    }

    catch(Exception $e) {
    die('Erreur :' .$e->getMessage());
    }

 
    if(!empty($_POST)){
        extract($_POST);
 
        if (isset($_POST['modification'])){
                $req = $bdd->prepare($update = "UPDATE user SET name = ?, mail = ?, phone = ?, bio = ? WHERE id ={$_SESSION['user-id']}");
                $req->execute(array(
                    $_SESSION['name'] = $name,
                    $_SESSION['mail'] = $mail,
                    $_SESSION['phone'] = $phone,
                    $_SESSION['bio'] = $bio));
                
                echo $req->rowCount() . "Modifications enregistrées! Veuillez vous reconnecter pour voir les modification." ;
                
        }
    }
?>
    <div class="section">
        <div class="Modif">Modification</div>
        <br>
        <form method="post">
            <input type="text" name="name" value="<?php echo $_SESSION["user-name"];?>">
            <input type="email" name="mail" value="<?php echo $_SESSION["user-mail"];?>">
            <input type="phone" name="phone" value="<?php echo $_SESSION["user-phone"];?>">
            <button type="submit" name="modification">Modifier</button>
    </div>
    <br>
    <div class="section2">
        <div class="Modif">Changez votre bio</div>
        <br>
            <div class="bio"><textarea type="Bio" name="bio"><?php echo utf8_decode($_SESSION["user-bio"]);?></textarea></div> <!--on a essayer mais utf8_decode ne fonctionne pas :'( -->

            <div class="biobutton"><button type="submit" name="modification">Modifier</button></div>

        </form>
    </div>
    </body>
</html>
