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

$artistes = $bdd->query('SELECT name FROM user ORDER BY id DESC');
	if(isset($_GET['recherche']) AND !empty($_GET['recherche'])) {
	   $recherche = htmlspecialchars($_GET['recherche']);
	   $artistes = $bdd->query('SELECT name FROM user WHERE name LIKE "%'.$recherche.'%" ORDER BY id DESC');
	   echo $artistes;
	}

$getAllArtists = $bdd->query('SELECT * FROM user WHERE id_rank = 2 ORDER BY creation DESC');
foreach($getAllArtists->fetchAll() as $data) {
?>

<div class="a">
    <div class="nd">
        <div id="name">Nom de l'artiste : <?php echo $data['name']; ?><br></div>
        <div id="date">Date de création de compte : <?php echo $data['creation']; ?><br></div>
    </div>
    <button id="consult">Consulter la page</>
</div>

<?php 
} 
?>

</body>
</html>
