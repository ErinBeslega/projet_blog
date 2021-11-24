<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon blog / Archives</title>
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
    <h1>Bienvenu sur les archives !</h1>
    </main>

    <?php 

    // Requête pour afficher le heptamarion
    $requete="SELECT * FROM billets ORDER BY id_billet DESC ";

    // J'envoie la requête
    $stmt=$db->query($requete);
    // Je recupère les information dans la variable version
    $result=$stmt->fetchall(PDO::FETCH_ASSOC);

    // Test : On regarde ce qu'il y a dans la variable result
    // var_dump($result);

    // On affiche les information stocker de chaque user
    foreach($result as $article){
        echo "<div class='billets''><h1>Article n° ".$article["id_billet"]."</h1><br>";
        echo "<p> Date de publication : ".$article["date_b"]."</p><br>";
        echo "<p> Date de publication : ".$article["contenu_b"]."</p><br>
        <button type='button'>Commentaires</button><div>";
    }
?>


    

</body>
</html>