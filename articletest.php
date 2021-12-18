<?php
require "connexion.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <style>

        .com{
            border:2px solid black;
            width:50%;
        }

        .com h1,p{
            margin-right: 10px;
        }
    
    </style>
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

       // Si je suis admin tata
       if (isset($_SESSION) && $_SESSION['login'] == "tata"){
          echo "<a href='createur.php'>Createur</a><br>";
      };
?>
</header>

    <?php 

        $id_billet = $_GET["id_billet"];
        $request = "SELECT * from billets WHERE id_billet=:id_billet";
        $requestCom = "SELECT * FROM commentaires WHERE ex_billets=$id_billet";
        $stmt = $db -> prepare($request);
        $stmt-> bindValue(':id_billet', $id_billet, PDO::PARAM_INT);
        $stmtCom = $db -> prepare($requestCom);
        $stmt -> execute();
        $stmtCom -> execute();
        //AFFICHER CONTENU DU BILLET
        $result=$stmt->fetch(PDO::FETCH_ASSOC);

        // ex_billets = id_billet AND 
        echo "<h1>Article n°".$id_billet."</h1>";
        echo "<p>".$result["contenu_b"]."</p>";

        //afficheCom
        if (!isset($result)) {
            echo "<p>Pas encore de commentaire, soyez le premier</p>";
        }else{
            foreach ($resultCom as $com){
                echo "<div class='com'>
                <h2>".$com['ex_utilisateurs']."</h2>
                <h4>".$com['titre_b']."</h4>
                <p> Date de publication : ".$com['date_c']."</p>
                <p>".$com['contenu_c']."</p></div>";
            }
        }
        $resultCom=$stmtCom->fetch(PDO::FETCH_ASSOC);


        function afficheCommentaire($id){
            $db = connect();
            $req="SELECT * FROM commentaire, utilisateur WHERE ext_billet=? AND ext_utilisateur=id ORDER BY id_com DESC";
            $stmt=$db->prepare($req);
            $stmt -> bindValue(1, $id, PDO::PARAM_INT);
            $stmt->execute();
            $result=$stmt->fetchall(PDO::FETCH_ASSOC);
        
            if($result != NULL){
                echo "<button id='affiche_com'>Afficher les commentaires</button><ul class='commentaire'>";
                foreach($result as $row){
                    echo "<li>Date du commentaire : {$row["date_com"]}<br><div>{$row["contenu_com"]}</div>Auteur : {$row["pseudo"]}<br>
                    </li>";
                } 
                echo "</ul>";
            }
        }
        
    ?>
<?php
      // Poster un commentaire si je suis connecté 
      if (isset($_SESSION["login"])){
          echo " <form action='traite_commentaire.php' method='POST'>
                    <strong>Ajouter un commentaire</strong><br>
                    <label for='login'>Pseudo :</label><br>
                    <input type='text' name='login' id='login'>
                    <br><br>
                    <label for='date_c'>Date de post :</label><br>
                    <input type='date' name='date_c'>
                    <br><br>
                    <label for='contenu_c'>Commentaire :</label><br>
                    <textarea name='contenu_c' id='ex_billets' cols='30' rows='8' placeholder='Qu'avez vous à dire ?'></textarea><br>
                    <button type='submit'>Ajouter un commentaire </button>
                </form>";
      };

?>

</body>

</html>