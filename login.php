<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de connexion</title>
</head>

<body>

    <?php
        require "connexion.php";
    ?>
    <form method="POST" action="traite_login.php">
        <label for="login">
            Votre login : <input type="text" name="login" placeholder="login" required="required">
        </label>

        <?php   // isset = is set ?   
                //!isset = est ce que la valeur n'existe pas ?
                // && = et
            if ((isset($_GET["erreur"])) && ($_GET["erreur"]=="login")){
                echo "login incorrect";
            }
        ?>
        <br>
        <label for="mdp">
            Votre mot de passe : <input type="password" name="password" placeholder="mot de passe" required="required">
        </label>

        <?php
            if (isset($_POST["erreur"]) && $_POST["erreur"]=="password"){
                echo "mot de passe incorrect";
                echo "<script>alert(\"Votre mot de passe semble incorect\")</script>";
            }
        ?>
        <br>
        <input type="submit" value="Connexion">
    </form>


</body>

</html>