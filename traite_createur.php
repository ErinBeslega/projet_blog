<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traite créateur</title>
</head>
<body>
<?php
// Envoyer un nouvel article dans la bdd
    $contenu_b=$_POST["contenu_b"];
    include("connexion.php");
    $date_b=$_POST["date_b"];
    $sql= "INSERT INTO billets (contenu_b, date_b) VALUES ('".$contenu_b."', '".$date_b."')";
    $db->query($sql);
    header('Location: createur.php');
    ?>
</body>
</html>