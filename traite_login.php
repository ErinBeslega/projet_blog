<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traite login</title>
</head>
<body>
<!-- Connexion à notre base de donné dans un fichier isolé pour plus de sécurité -->
<?php 
    require "connexion.php";

    $login=$_POST["login"];
    $password=$_POST["password"];
    $requete="SELECT * FROM `utilisateurs` WHERE `login`='$login'";

    // var pour vérifier login et pswd
    $req_count=$db->query($requete); 
    $verif=$req_count->rowCount(); 
    $data_verif=$req_count->fetch(PDO::FETCH_ASSOC);

    if ($verif==1){
        if (password_verify($password,$data_verif["mot_de_passe"])){
            session_start();
            $_SESSION["login"]=$data_verif["login"];
            $_SESSION["id_user"]=$data_verif["id_user"];
            echo "<script>alert(\"Vous êtes connecté\")</script>";
            header('Location: monblog.php'); //page d'acceuil du blog pour l'utilisateur
        }else{
            header('Location: login.php?error=mdp'); //page login avec erreur de connexion
            echo "<script>alert(\"Mdp incorrect !\")</script>";
            }
    }else{
        header('Location: login.php?error=login');
        echo "Vous ne semblez pas avoir de compte sur ce blog, veuillez vous en créer un";
        echo "<a href=\"inscription.php\"> Cliquez ici pour vous inscrire </a>";
    }
?>
</body>
</html>