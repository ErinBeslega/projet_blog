<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    
    <?php 
    if (!isset($_GET["error"])){
    }else{
        echo "<script>document.querySelector('.erreur').innerHTML='Il y a une erreur';</script>";
    }
    include("connexion.php");
    ?>
    <form method="GET" action="traite_login.php">
        <input type="text" name="login" id="" placeholder="login" require>
        <?php
            if (isset($_GET["erreur"]) && $_GET["erreur"]=="login"){
                echo "mauvais login";
            }
        ?>
        <input type="password" name="password" id="" placeholder="password" require>
        <?php
            if (isset($_GET["erreur"]) && $_GET["erreur"]=="password"){
                echo "mauvais mot de passe";
            }
        ?>
        <div class="erreur"></div>
        <input type="submit" value="Envoyer">
    </form>
    


</body>

</html>