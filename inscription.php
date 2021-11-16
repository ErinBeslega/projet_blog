<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
</head>
<body>
    <?php
        include("connexion.php");
    ?>
    <form method="GET" action="traite_inscription.php">
        <input type="text" name="login" id="" placeholder="login">
        <input type="password" name="password" id="" placeholder="mot de passe">
        <input type="submit" value="S'inscrire">
    </form>
   
</body>
</html>