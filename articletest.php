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
            foreach ($resultCom as $result){
                echo "<div class='com'>
                <h2>".$resultCom['ex_utilisateurs']."</h2>
                <h4>".$resultCom['titre_b']."</h4>
                <p> Date de publication : ".$resultCom['date_c']."</p>
                <p>".$resultCom['contenu_c']."</p></div>";
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

    <form action="" method="post">
        <strong>Ajouter un commentaire</strong><br>
        <label for="login">Pseudo :</label><br>
        <input type="text" name="login" id="login">
        <br><br>
        <label for="commentaire">Commentaire :</label><br>
        <textarea name="ex_billets" id="ex_billets" cols="30" rows="8" placeholder="Qu'avez vous à dire ?"></textarea><br>
        <button type="submit">Envoyer</button>
    </form>


</body>

</html>