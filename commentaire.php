<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style_inscription.css">
    <title>Ajout de commentaire</title>
</head>
<body>
    <?php
        include("connexion.php");
    ?>
    <form method="POST" action="traite_commentaire.php">
    <h1>Ajoute ton commentaire</h1>
        <input type="text" name="login" id="" placeholder="Login">
        <input type="date" name="date" id="" placeholder="Date">
        <input type="text" name="com" id="" placeholder="Exprime toi !">
        <input class="connect" type="submit" value="Ajouter">
    </form>
   
</body>
</html>