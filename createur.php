<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon blog / Création billets</title>
</head>

<body>

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

       // Si je suis admin toto
       if (isset($_SESSION) && $_SESSION['login'] == "toto"){
          echo "<a href='createur.php'>Createur</a><br>";
      };
?>
    </header>

    <!-- Espace admin : Ajouter un article  -->
    <main id="billet">
        <h1>Bienvenu super createur !</h1>
    </main>

    <form method="POST" action="traite_createur.php">
    <h1>Ajouter un article</h1>
        <label for="contenu_b">Contenu de l'article :</label>
        <input type="text" name="contenu_b" id="" placeholder="Ecrit un nouvel article !" cols="30" rows="8">
        <label for="date_b">Date :</label>
        <input type="date" name="date_b" id="">
        <input type="submit" value="Ajouter l'article">
    </form>
</body>
</html>