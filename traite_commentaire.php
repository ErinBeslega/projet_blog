<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traite commentaire</title>
</head>
<body>
<?php
// Envoyer un nouvel article dans la bdd
    $login=$_POST["login"];
    include("connexion.php");
    $date_c=$_POST["date_c"];
    $contenu_c=$_POST["contenu_c"];
    $sql= "INSERT INTO commentaires (login, contenu_c, date_c) VALUES ('".$login."', '".$contenu_c."', '".$date_c."')";
    $db->query($sql);
    header('Location: articletest.php');
    ?>
</body>
</html>