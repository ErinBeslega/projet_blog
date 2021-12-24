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
    <?php
       session_start();
       // Se déconnecter
       if(isset($_POST['deconnexion'])){
          session_destroy();
          $_SESSION=array();
          header("Location: login.php");
      };

      // Si je suis connecté 
      if (isset($_SESSION["login"])){
          echo "<a href='deconnexion.php'>Déconnexion</a><br>
          <a href='monblog.php'>Accueil</a><br>
          <a href='monblog_archive.php'>Archives</a><br>";
      };

       // Si je suis visiteur
       if (isset($_SESSION["login"]) == ""){
          echo "<a href='monblog.php'>Accueil</a><br>
          <a href='monblog_archive.php'>Archives</a><br>
          <a href='inscription.php'>Inscription</a><br>
          <a href='login.php'>Connexion</a>";
      };

       // Si je suis admin tata
       if (isset($_SESSION) && $_SESSION['login'] == "toto"){
          echo "<a href='createur.php'>Createur</a><br>";
      };
?>
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
        <h1>Article n° ".$article["id_billet"]."</h1><h1>".$article["titre_b"]."</h1>
        <br>
        <p> Date de publication : ".$article["date_b"]."</p>
        <br>
        <p>".$article["contenu_b"]."</p>
        <br>
        <a href='articletest.php?id_billet=".$article["id_billet"]."'>Le lien</a>
        <div>";
    }  
?>

</body>

</html>