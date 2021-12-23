<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>traite_commentaire</title>
</head>
<body>
<?php
// Envoyer un nouvel article dans la bdd
    include("connexion.php");
    $date_c=$_POST["date"];
    $contenu_c=$_POST["contenu"];
    $id_billet= $_SESSION["id_billet"];
    $login_user = $_SESSION["ex_utilisateurs"];
    $sql = "INSERT INTO `commentaires` (`id_commentaire`, `date_c`, `contenu_c`, `ex_billets`, `ex_utilisateurs`) VALUES (NULL, '$date_c', '$contenu_c', '$id_billet', '$login_user')";
    $db->query($sql);
    // header("Location: articletest.php?
    // le header ne marche pas
    header("Location: login.php");
    ?>
</body>
</html>