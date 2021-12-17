<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon blog / Créateur</title>
</head>

<body>
    <header>
    <a href='monblog.php'>Accueil</a><br>
            <a href='monblog_archive.php'>Archives</a><br>
            <a href='createur.php'>Createur</a><br>
    </header>

    <!-- Articles -->
    <main id="billet">
        <h1>Bienvenu super createur !</h1>
    </main>
    <?php 
    include ("connexion.php");
    $requete='SELECT * FROM billets, commentaires WHERE billets.id_billet = commentaires.ex_billets ORDER BY id_billet DESC LIMIT 3';
    $stmt=$db->query($requete);
    $result=$stmt->fetchall(PDO::FETCH_ASSOC);

    // var_dump($result);

    // On affiche les information stocker de chaque user
    // foreach($result as $article){
    //     echo "<div id='billet".$article["id_billet"]."' class='billets''>
    //     <h1>Article n° ".$article["id_billet"]."</h1>
    //     <br>
    //     <p> Date de publication : ".$article["date_b"]."</p>
    //     <br>
    //     <p>".$article["contenu_b"]."</p>
    //     <br>
    //     <a href='./articletest.php?id_billet=".$article["id_billet"]."'>Afficher l'article</a>
    //     <div>";
    // };
?>

<form method="POST" action="traite_billet.php">
    <h1>Ajouter un billet</h1>
        <input type="text" name="login" id="" placeholder="login">
        <input type="password" name="password" id="" placeholder="mot de passe">
        <input type="submit" value="S'inscrire">
        <button href="connexion.php">Se connecter</button>
        <a href="monblog.php">Visiteur</a>
    </form>


</body>

</html>