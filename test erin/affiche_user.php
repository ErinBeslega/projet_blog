<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
</head>
<body>

<?php 
// Ex2 : Connexion à la base de donné 
    include ("connexion.php");

    // Requête pour afficher le heptamarion
    $requete="SELECT * FROM utilisateurs";

    // J'envoie la requête
    $stmt=$db->query($requete);
    // Je recupère les information dans la variable version
    $result=$stmt->fetchall(PDO::FETCH_ASSOC);

    // Test : On regarde ce qu'il y a dans la variable result
    // var_dump($result);

    // On affiche les information stocker de chaque user
    foreach($result as $user){
        echo "<h1>Id : ".$user["id_utilisateur"]."</h1><br>";
        echo "<p>Login : ".$user["login"]."<br>";
        echo "Mot de passe : ".$user["mot_de_passe"]."</p><br>";
    }
?>
</body>
</html>