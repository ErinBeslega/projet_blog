<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_inscription.css">
    <title>inscription</title>
</head>
<body>
    <?php
        require "connexion.php";
    ?>
    <form method="POST" action="traite_inscription.php">
    <h1>Inscription</h1>
        <input type="text" name="login" id="" placeholder="login">
        <input type="password" name="password" id="" placeholder="mot de passe">
        <input type="submit" value="S'inscrire">
        <button href="connexion.php">Se connecter</button>
        <button href="monblog.php">Visiteur</button>
    </form>
   
</body>
</html>