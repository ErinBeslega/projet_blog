<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_inscription.css">
    <title>Inscription</title>
</head>
<body>
    <!-- Connexion à notre base de donné dans un fichier isolé pour plus de sécurité -->
    <?php
        require "connexion.php";
    ?>
    
    <!-- Formulaire pour s'inscrire comme nouvel utilisateur -->
    <form method="POST" action="traite_inscription.php">
    <h1>Inscription</h1>
        <input type="text" name="login" id="" placeholder="login" required="required">
        <input type="password" name="password" id="" placeholder="mot de passe" required="required">
        <input type="submit" value="S'inscrire">
        <a href="login.php">Se connecter</a>
        <a href="monblog.php">Visiteur</a>
    </form>
   
</body>
</html>