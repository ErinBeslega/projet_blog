<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traite inscription</title>
</head>
<body>
<?php
// Envoyer un nouvel utilisateur dans la bdd
// Problème constaté vous pouvez tout de même vous connecté avec l'utilisateur neo ou erin (pswd 123)
    $login_oui=$_POST["login"];
    include("connexion.php");

    $requete = 'SELECT * FROM utilisateurs WHERE login=$login_oui'; 
    $stmt = $login_oui->prepare($requete);
    $stmt -> execute();
    if($stmt -> rowcount()==1){
        header('Location: inscripiton.php');
    } else {
        $password=$_POST["password"];
        $password=password_hash($password,PASSWORD_DEFAULT);
        $sql= "INSERT INTO utilisateurs (login, mot_de_passe) VALUES ('$login', '$password')";
        $db->query($sql);
        header('Location: login.php');
    }  
    ?>
</body>
</html>