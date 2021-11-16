<?php
    // Exercice 3 : Q2. Connexion à la bdd
    include ("connexion.php");

    // Requête pour afficher le heptamarion
    $requete="SELECT * FROM utilisateurs WHERE login=:login";
    $stmt=$db->prepare($requete);
    $stmt->bindParam(':login',$_GET["login"], PDO::PARAM_STR);
    $stmt->execute();

    // Nombre de ligne renvoyé par la requête 
    // Si différent de 0 alors c'est le bon login
    if ($stmt->rowcount() != 0){

        // On récupère les info dans $utilisateurs
        $utilisateurs=$stmt->fetch(PDO::FETCH_ASSOC);
            
            // Si le mot de passe de la bdd correspond à celui inséré dans le form
            // Get_name du formulaire
            if ($utilisateurs["mot_de_passe"]==$_GET["mdp"]){
                echo "<b>Vous êtes connecté !</b><br>";

                echo "<p>Id : ".$utilisateurs["id_utilisateur"]."<br>";
                echo "Mot de passe : ".$utilisateurs["mot_de_passe"]."<br>";
                echo "Login : ".$utilisateurs["login"]."</p><br>";
            }else{
                echo "Mot de passe incorrect !";
                
                // Redirection vers l'autre page pour recommencer
                header ('Location:saisie_login.php?erreur=mdp');

            }

    // Sinon le login est incorrect
    }else{ 
        echo"Login incorrect !";
        header ('Location:saisie_login.php?erreur=login');
         
    }

    
 


?>