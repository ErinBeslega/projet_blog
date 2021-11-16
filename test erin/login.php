<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog_login</title>
</head>
<body>
    <!-- Connexion à la base de donnée -->
<?php
    include ("connexion.php");
?>

    <!-- Ex3 : Q1 formulaire -->
    <form action="traitelogin.php" method="GET">
        <h1>Connectez vous avec vos identifiants / Mot de passe :</h1>

        <!-- Champs texte identifiant -->
        Login : <input type="text" name="login" id="login">
        <?php
        if (isset($_GET["erreur"]) && $_GET["erreur"]=="login"){
            echo "Mauvais login !";
        }
        ?>

        <!-- Champs texte login -->
        Mot de passe : <input type="text" name="mdp" id="mdp">
        <?php
        if (isset($_GET["erreur"]) && $_GET["erreur"]=="mdp"){
            echo "Mauvais mot de passe !";
        }
        ?>
        <!-- Bouton envoyer -->
        <input type=submit value="Connexion"> 
    </form>

    </select>
    
</body>
</html>