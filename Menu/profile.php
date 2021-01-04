<html>
<?php
    require_once 'header.php';
		 
	/*if(isset($_SESSION['id'])) {
	   $requser = $bdd->prepare("SELECT * FROM user WHERE id = ?");
	   $user = $requser->fetch();
	   if(isset($_POST['newname']) AND !empty($_POST['newname']) AND $_POST['newname'] != $user['name']) {
	        $newname = htmlspecialchars($_POST['newname']);
	        $insertname = $bdd->prepare("UPDATE user SET name = ? WHERE id = ?");
	        $insertname->execute(array($newname, $_SESSION['id']));
	        header('Location: profile.php'.$_SESSION['id']);
       }
       
	   if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['mail']) {
	        $newmail = htmlspecialchars($_POST['newmail']);
	        $insertmail = $bdd->prepare("UPDATE user SET mail = ? WHERE id = ?");
	        $insertmail->execute(array($newmail, $_SESSION['id']));
	        header('Location: profile.php'.$_SESSION['id']);
	   }
       
	   if(isset($_POST['newphone']) AND !empty($_POST['newphone']) AND $_POST['newphone'] != $user['phone']) {
	        $newphone = htmlspecialchars($_POST['newphone']);
	        $insertphone = $bdd->prepare("UPDATE user SET phone = ? WHERE id = ?");
	        $insertphone->execute(array($newphone, $_SESSION['id']));
	        header('Location: profile.php'.$_SESSION['id']);
       }
       
       	   if(isset($_POST['newbio']) AND !empty($_POST['newbio']) AND $_POST['newbio'] != $user['bio']) {
	        $newbio = htmlspecialchars($_POST['newbio']);
	        $insertbio = $bdd->prepare("UPDATE user SET bio = ? WHERE id = ?");
	        $insertbio->execute(array($newbio, $_SESSION['id']));
	        header('Location: profile.php'.$_SESSION['id']);
	   }

       if(isset($_POST['newmdp']) AND !empty($_POST['newmdp'])) {
            $mdp = sha1($_POST['newmdp']); {
	        $insertmdp = $bdd->prepare("UPDATE user SET password = ? WHERE id = ?");
	        $insertmdp->execute(array($mdp, $_SESSION['id']));
	        header('Location: profile.php'.$_SESSION['id']);
       } */
    ?> 
    
	<html>
	   <head>
	      <title>EDIT PROFIL</title>
	   </head>
	   <body>
            <div>
                <?php var_dump($user) ?>
	            <h2>Profil de <?php echo $user['name']; ?></h2>
	            <br><br>
	            Nom : <?php echo $user['name']; ?>
	            <br>
	            Mail : <?php echo $user['mail']; ?>
	            <br>
                Téléphone : <?php echo $user['phone']; ?>
                <br>
                Bio : <?php echo $user['bio']; ?>
                <br>
	        </div>

	        <div>
	            <h2>Edition de mon profil</h2>
	                <div>
                    <form method="POST" action="includes/updateprofile.php" enctype="multipart/form-data">
	                    <label>Nom :</label>
	                    <input type="text" name="newname" placeholder="Nom" value="<?php echo $user['name']; ?>"/><br><br>
	                    <label>Mail :</label>
                        <input type="text" name="newmail" placeholder="Mail" value="<?php echo $user['mail']; ?>" /><br><br>
                        <label>Téléphone :</label>
                        <input type="text" name="newphone" placeholder="Téléphone" value="<?php echo $user['phone']; ?>" /><br><br>
                        <label>Bio :</label>
	                    <textarea type="text" name="newbio" placeholder="Bio"><?php echo $user['bio']; ?></textarea><br><br>
	                    <label>Mot de passe :</label>
                        <input type="password" name="newmdp" placeholder="Mot de passe"/><br><br>
	                    <input type="submit" value="Mettre à jour mon profil" />
                        </form>
	                </div>
	        </div>
	   </body>
    </html>

    <?php   
    /*   }
        else {
	        header("Location: login.php");
            } 
        } */   
    ?>