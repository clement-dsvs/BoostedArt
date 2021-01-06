<head>
<?php
        require_once 'header.php';
    ?>
    <link rel="stylesheet" href="/style/artists.css">
</head>
<body>

<div class="rech">
    <form method="get">
	   <input type="search" name="recherche" placeholder="Recherche" />
	   <input type="submit" value="Valider" />
    </form>
</div>

<?php 

try {
    $bdd=new PDO('mysql:host=localhost;dbname=boosted-art;charset=UTF8', 'root','root');
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
}

catch(Exception $e) {
    die('Erreur :' .$e->getMessage());
}

//La fonction de recherche est en cours de réparationnage (oui Jeremy c'est fait exprès ne fait pas une syncope plz)

/* $artistes = $bdd->query('SELECT name FROM user ORDER BY id DESC');
	if(isset($_GET['recherche']) AND !empty($_GET['recherche'])) {
	   $recherche = htmlspecialchars($_GET['recherche']);
	   $artistes = $bdd->query('SELECT name FROM user WHERE name LIKE "%'.$recherche.'%" ORDER BY id DESC');
	   echo $artistes[1];
	} */

$getAllArtists = $bdd->query('SELECT * FROM user WHERE id_rank = 2 ORDER BY creation DESC');
foreach($getAllArtists->fetchAll() as $data) {
?>

<div class="a">
    <div class="nd">
        <div id="name"><b>• Nom de l'artiste : </b><?php echo $data['name']; ?><br><br></div>
        <div id="bio">"<i> <?php echo $data['bio']; ?> </i>"<br><br>
        <div id="date">Membre depuis : <?php echo $data['creation']; ?><br><br></div>
    </div>
    <button id="consult">Consulter la page</button>
    <br><br><br>
</div>

<?php 
} 
?>

</body>
</html>
