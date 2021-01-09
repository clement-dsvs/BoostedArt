<html>
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

    $user = $bdd->query("SELECT * FROM user WHERE id = ?");

 
    if(!empty($_POST)){
        extract($_POST);
 
        if (isset($_POST['modification'])){
                $req = $bdd->prepare($update = "UPDATE user SET name = ?, mail = ?, phone = ?, bio = ? WHERE id ={$_SESSION['user-id']}");
                $req->execute(array(
                    $_SESSION['name'] = $name,
                    $_SESSION['mail'] = $mail,
                    $_SESSION['phone'] = $phone,
                    $_SESSION['bio'] = $bio));
                echo $req->rowCount() . "Modifications enregistrées!";

        }
    }
?>
        <div>Modification<br><br></div>
        <form method="post">
            <input type="text" placeholder="Prénom et nom" name="name" value="<?php echo $user['name'];?>">
            <input type="email" placeholder="Adresse mail" name="mail" value="<?php echo $user['mail'];?>">
            <input type="phone" placeholder="Numéro de téléphone" name="phone" value="<?php echo $user['phone'];?>">
            <textarea type="Bio" placeholder="Biographie" name="bio" value="<?php echo $user['bio'];?>"></textarea>

            <button type="submit" name="modification">Modifier</button>

        </form>
    </body>
</html>
