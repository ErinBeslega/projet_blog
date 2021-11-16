<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>traite_inscription</title>
</head>
<body>
<?php 

        include("connexion.php");
        $login=$_GET["login"];
        $password=$_GET["password"];
        $password=password_hash($password,PASSWORD_DEFAULT);
        $sql= "INSERT INTO utilisateurs (login, mot_de_passe) VALUES ('".$login."', '".$password."')";
        echo ('Vous êtes inscrit !');
        $db->query($sql);
        
    ?>
</body>
</html>