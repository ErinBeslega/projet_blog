<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>traitelogin</title>
</head>
<body>

<?php 
    require "connexion.php";

    $login=$_POST["login"];
    $password=$_POST["password"];

    $requete="SELECT `login`,`mot_de_passe` FROM `utilisateurs` WHERE `login`='$login'";
    
    // $stmt=$db->prepare($requete);
    // $stmt->bindParam(':login',$_POST["login"], PDO::PARAM_STR);
    // $stmt->execute();

    // var pour vérifier login et mdp
    $req_count=$db->query($requete); //req_count = requete sql de la bdd
    $verif=$req_count->rowCount(); //verif = 
    
    // echo $req_count

    $data_verif=$req_count->fetch(PDO::FETCH_ASSOC);

    if ($verif==1){
        if (password_verify($password,$data_verif["mot_de_passe"])){
            session_start();
            $_SESSION["login"]=$data_verif["login"];
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