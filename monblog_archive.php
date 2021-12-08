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

    $requete="SELECT * FROM billets ORDER BY id_billet DESC ";

    $stmt=$db->query($requete);
    $result=$stmt->fetchall(PDO::FETCH_ASSOC);

    foreach($result as $article){
        echo "<div id='billet$compteur' class='billets''>
        <h1>Article n° ".$article["id_billet"]."</h1>
        <br>
        <p> Date de publication : ".$article["date_b"]."</p>
        <br>
        <p>".$article["contenu_b"]."</p>
        <br>
        <a href='articletest.php?id_billet=".$article["id_billet"]."'>Le lien</a>
        <div>";

        // code pour afficher les com
        // foreach($commentaire as $com){
        //     echo "<div class='com'>
        //     <h1>".$com['ex_utilisateurs']."</h1><br>
        //     <p> Date de publication".$com['date_c']."</p>
        //     <p>".$com['contenu_c']."</p>
        //     </div>";
        // };
    }  
?>

</body>

</html>