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
        .com {
            border: 2px solid black;
            width: 50%;
        }

        .com h1,
        p {
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
       if (isset($_SESSION) && $_SESSION['login'] == "toto"){
          echo "<a href='createur.php'>Createur</a><br>";
      };
?>
    </header>

    <?php
    
        $id_billet = $_GET["id_billet"];
        $request = "SELECT * from billets WHERE id_billet=:id_billet";
        $requestCom = "SELECT * FROM commentaires, utilisateurs WHERE ex_billets=$id_billet AND ex_utilisateurs=id_user";
        $stmt = $db -> prepare($request);
        $stmt-> bindValue(':id_billet', $id_billet, PDO::PARAM_INT);
        $stmtCom = $db -> prepare($requestCom);
        $stmt -> execute();
        $stmtCom -> execute();
        //AFFICHER CONTENU DU BILLET
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        // $resultCom=$stmtCom->fetch(PDO::FETCH_ASSOC);

        echo "<h1>Article n°{$id_billet}</h1>
              <h1>{$result["titre_b"]}</h1>
              <p>{$result["contenu_b"]}</p>";



        echo "<h3>Commentaires :</h3><ul class='commentaire'>";
        while ($resultCom=$stmtCom->fetch(PDO::FETCH_ASSOC)) {
            // $_SESSION["id_user"]=$resultCom["id_user"];
                echo "<li>Date du commentaire : ".$resultCom["date_c"]."<br>
                <div>".$resultCom["contenu_c"]."</div>
                Auteur : ".$resultCom["login"]."
                </li>";      
        };

        echo "</ul>";
            
            // Poster un commentaire si je suis connecté 
            if (isset($_SESSION["login"])){
                $_SESSION["id_billet"] = $result["id_billet"];
                echo "<button id='nouv_com'>Ajouter un commmentaire</button>";
                echo "<form action='traite_commentaire.php' method='POST' id='com'>
                    <strong>Ajouter un commentaire</strong><br>
                    <br><br>
                    <input type='hidden' id='id_user' name='id_user' value=".$_SESSION["id_user"].">
                    <input type='hidden' id='id_billet' name='id_billet' value=".$_SESSION["id_billet"].">
                    <label for='date'>Date de post :</label><br>
                    <input type='date' name='date' required='required'>
                    <br><br>
                    <label for='contenu'>Commentaire :</label><br>
                    <textarea name='contenu' id='ex_billets' cols='30' rows='8' placeholder=\"Qu'avez vous à dire ?\" required=\"required\"></textarea><br>
                    <button type='submit'>Ajouter un commentaire </button>
                </form>";
            };
        

?>

    <script>
        document.getElementById('com').style.display = 'none';

        document.getElementById('nouv_com').addEventListener("click", () => {
            if (document.getElementById('com').style.display == 'none') {
                document.getElementById('com').style.display = 'block';
            } else {
                document.getElementById('com').style.display = 'none';
            }
        })
    </script>
</body>

</html>