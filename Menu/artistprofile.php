<html>
<head>
<?php
        require_once 'header.php';
    ?>
    <link rel="stylesheet" href="/style/artists.css">
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

$getArtist = $bdd->prepare('SELECT * FROM user WHERE id = ?');
$getArtist->execute(array($_GET['id']));
foreach($getArtist->fetchAll() as $data) {
echo("<div class='a'>
        <div class='nd'>
            <div id='name'><b>• Nom de l'artiste : </b>{$data['name']}<br><br></div>
            <div id='bio'>'<i> {$data['bio']}</i>'<br><br>
            <div id='date'>Membre depuis : {$data['creation']}<br><br></div>
        </div>
        <button id='consult'><a href='artists.php'>Retour</a></button>
        <br><br><br>
</div>");
}?>