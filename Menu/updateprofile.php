
<?php
    require_once 'header.php'; ?>

    <head>

    <title>Modifier votre profil</title>
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

        <div>Modification<br><br></div>
        <form method="post">
            <input type="text" name="name" value="<?php echo $_SESSION["user-name"];?>">
            <input type="email" name="mail" value="<?php echo $_SESSION["user-mail"];?>">
            <input type="phone" name="phone" value="<?php echo $_SESSION["user-phone"];?>">
            <textarea type="Bio" name="bio"><?php echo utf8_decode($_SESSION["user-bio"]);?></textarea> <!--on a essayer mais utf8_decode ne fonctionne pas :'( -->

            <button type="submit" name="modification">Modifier</button>

        </form>
    </body>
</html>
