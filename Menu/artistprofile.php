<html>
<head>
<?php
    require_once 'header.php'; 
    if(!isset($_SESSION["user-name"])){
        header('location: login.php');
        exit();
    }
    
?>
    <title>Profil Artiste</title>
    <link rel="stylesheet" href="style/style-artists.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="script.js"></script>
</head>
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
    echo("
    <div class='section'>
        <div class='name'><h2>Nom de l'artiste</h2>{$data['name']}</div>
        <div class='date'>Membre depuis le {$data['creation']}</div>
        <br>
        <button id='consult'><a href='artists.php'>Retour</a></button>
    </div>
    <br>
    <div class='section2'>
        <div class='bio'><h2>Sa biographie</h2>'<i> {$data['bio']}</i>'</div>
    </div>
    
");
}?>
