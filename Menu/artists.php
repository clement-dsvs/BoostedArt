<html>
<head>
<?php
    require_once 'header.php'; 
    if(!isset($_SESSION["user-name"])){
        header('location: login.php');
        exit();
    }
    
?>
    <title>Recherche Artistes</title>
    <link rel="stylesheet" href="style/style-artists.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="script.js"></script>
</head>

<body>

<div class="recherche">
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

$artistes = $bdd->query('SELECT name FROM user ORDER BY id DESC');
	if(isset($_GET['recherche']) AND !empty($_GET['recherche'])) {
	   $recherche = htmlspecialchars($_GET['recherche']);
	   $artistes = $bdd->query('SELECT name FROM user WHERE name LIKE "%'.$recherche.'%" ORDER BY id DESC');
       echo $artistes['name'];
       //echo("En fait ça marche pas déso.");?><br><br> <?php
	}

$getAllArtists = $bdd->query('SELECT * FROM user WHERE id_rank = 2 ORDER BY creation DESC');
foreach($getAllArtists->fetchAll() as $data) {

echo("
        <div class='section'>
            <div class='name'><h2>Nom de l'artiste</h2>{$data['name']}</div>
            <div class='date'>Membre depuis le {$data['creation']}</div>
            <br>
            <button id='consult'><a href='artistprofile.php?id={$data['id']}'>Consulter la page</a></button>
        </div>
        <br>
        <div class='section2'>
            <div class='bio'><h2>Sa biographie</h2>'<i> {$data['bio']}</i>'</div>
        </div>
        
    ");
}?>

</body>
</html>
