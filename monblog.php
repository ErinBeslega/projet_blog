<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon blog</title>
</head>
<body>

    <?php 
        require "connexion.php";

    ?>

    <header>
        <li><a href="monblog.php">Accueil</a></li>
        <li><a href="monblog_archive.php">Archives</a></li>

        <a href="inscription.php">INSCRIPTION</a>
        <a href="login.php">CONNEXION</a>
    </header>
    
    <!-- Articles -->
    <main id="billet"> 
    <h1>Bienvenu sur le site !</h1>
    </main>

    

</body>
</html>