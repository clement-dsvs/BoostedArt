<html>
<head>
    <?php
    require_once 'header.php';
    ?>
    <link rel="stylesheet" href="style/style-contact.css">
</head>
<body>

<form id="contact_form" method="post">
    <h2>Nous contacter</h2>

  <div class="row">
    <label class="required" for="name">Votre nom :</label><br><br>
    <input id="name" class="input" name="name" type="text" value="" size="30" /><br><br>
  </div>

  <div class="row">
    <label class="required" for="email">Votre email :</label><br><br>
    <input id="email" class="input" name="email" type="text" value="" size="30" /><br><br>
  </div>

  <div class="row">
    <label class="required" for="message">Votre message :</label><br><br>
    <textarea id="message" class="input" name="message" rows="10" cols="40"></textarea><br><br>
  </div>
    
    <input id="submit_button" type="submit" value="Envoyer" />
</form>

</html>

<?php
if (isset($_POST['message'])) {
    $position_arobase = strpos($_POST['email'], '@');
    if ($position_arobase === false)
        echo '<p>Votre email doit comporter un arobase.</p>';
    else {
        $send = mail('test@test.fr', 'Envoi depuis la page Contact', $_POST['message'], 'De : ' . $_POST['email']);
        if($send)
            echo '<p>Votre message a été envoyé.</p>';
        else
            echo '<p>Erreur.</p>';
        }
}
?>


