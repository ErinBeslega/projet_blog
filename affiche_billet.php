<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billet</title>
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

<form action="affiche_billet.php" method="get">
    <input name="submit" type="submit" value="Afficher l'article">
</form>
<?php 

    // Requête pour afficher le heptamarion
    $requete="SELECT * FROM billets, commentaires WHERE billets.id_billet = commentaires.ex_billets";
    // $requete="SELECT * FROM billets, commentaires, utilisateurs WHERE billets.id_billet = commentaires.ex_billets AND utilisateurs.id_user = commentaires.ex_billets";

    // J'envoie la requête
    $stmt=$db->query($requete);
    // Je recupère les information dans la variable version
    $result=$stmt->fetchall(PDO::FETCH_ASSOC);

// Test 1
if (isset($_GET['submit']) ){
    echo "<div class='billets''><h1>Article n° ".$_GET['id_billet']."</h1><br>
         <p> Date de publication : ".$_GET['date_b']."</p><br>
         <p> ".$_GET['contenu_b']."</p><br>
         <p class='com'> <b> Pseudo : ".$_GET['login']." </b><br>
         ".$_GET['date_c']."<br>
         ".$_GET['contenu_c']."</p><br>";
} 

// Test 2
// if ( isset($_GET['submit']) ){
//     foreach ($result as $article){
//         echo "<div class='billets''><h1>Article n° ".$article["id_billet"]."</h1><br>";
//     }
// }; 

?>

    
</body>
</html>