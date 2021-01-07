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


    /*if (!isset($_SESSION['id'])){
        header('Location: login.php');
        exit; 
    }*/
 
    $user = $bdd->query("SELECT * FROM user WHERE id = ?");
    //$user = $user->fetchAll();
 
    if(!empty($_POST)){
        extract($_POST);
 
        if (isset($_POST['modification'])){
                $bdd->query("UPDATE user SET name = ?, mail = ?, phone = ?, password = ?, bio = ? WHERE id = ?");
                $_SESSION['name'] = $name;
                $_SESSION['mail'] = $mail;
                $_SESSION['phone'] = $phone;
                $_SESSION['password'] = $password;
                $_SESSION['bio'] = $bio;
 
                header('Location:profile.php');
                exit;   
        }
    }
?>

        <div>Modification<br><br></div>
        <form method="post">
            <input type="text" placeholder="Prénom et nom" name="name" value="<?php echo $user['name'];?>">
            <input type="email" placeholder="Adresse mail" name="mail" value="<?php echo $user['mail'];?>">
            <input type="phone" placeholder="Numéro de téléphone" name="phone" value="<?php echo $user['phone'];?>">
            <input type="password" placeholder="Mot de passe" name="password">
            <textarea type="Bio" placeholder="Biographie" name="bio" value="<?php echo $user['bio'];?>"></textarea>

            <button type="submit" name="modification">Modifier</button>

        </form>
    </body>
</html>