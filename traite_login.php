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
    include("connexion.php");

    $login=$_GET["login"];
    $password=$_GET["password"];
    $sql="SELECT `login`,`mot_de_passe` FROM `utilisateurs` WHERE `login`='$login'";

    $req_count=$link->query($sql);
    $verif=$req_count->rowCount();
    
    if ($verif==1){
        $data_verif=$req_count->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password,$data_verif["mot_de_passe"] ) ){
            session_start();
            $_SESSION["login"]=$data_verif["login"];
            header('Location: ./consultation.php');
        
        }else{
            header('Location: ./login.php?error=mdp');
            ?>
            <h1>tu n'as pas le bon mot de passe</h1>
            <?php
        }
    }else{
        echo"tu existe pas";
        header('Location: ./login.php?error=login');
    }
    ?>
</body>
</html>