<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon blog / Accueil</title>
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

         // Si je suis admin remplacer dans la bbd login = 1
         if (isset($_SESSION) && $_SESSION['login'] == "tata"){
            echo "<a href='createur.php'>Createur</a><br>";
        };
    ?>

    </header>

    <!-- Articles -->
    <main id="billet">
        <h1>Bienvenu sur le site !</h1>
    </main>
    <?php 
    include ("connexion.php");
    $requete='SELECT * FROM billets, commentaires WHERE billets.id_billet = commentaires.ex_billets ORDER BY id_billet DESC LIMIT 3';
    $stmt=$db->query($requete);
    $result=$stmt->fetchall(PDO::FETCH_ASSOC);

    // var_dump($result);

    // On affiche les information stocker de chaque user
    foreach($result as $article){
        echo "<div id='billet".$article["id_billet"]."' class='billets''>
        <h1>Article n° ".$article["id_billet"]."</h1>
        <h1>".$article["titre_b"]."</h1>
        <p> Date de publication : ".$article["date_b"]."</p>
        <br>
        <p>".$article["contenu_b"]."</p>
        <br>
        <a href='./articletest.php?id_billet=".$article["id_billet"]."'>Afficher l'article</a>
        <div>";
    }  
?>

    <!-- <main id="billet">
        <h1>Bienvenu sur le site !</h1>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#button").click(function (e) {
                e.preventDefault();
                $.getJSON('affiche_version.php', {
                        version: $('#select option:selected').attr('value')
                    },
                    function (donnees) {

                        var htmlJSON = JSON.stringify(donnees, undefined, 4)
                        var html = `
                              <h1>Version ${donnees.id} de <i>L'Heptaméron</i> de Marguerite de Navarre (${donnees.code})</h1>
                              <p>Type : ${donnees.type}<br>Version publiée en ${donnees.year}</p>
                              <p>Le titre de cette version est <i>${donnees.title}</i></p>
                              <p>Localisation de l'exemplaire numérisé : ${donnees.location}</p>
                              <p>Publié par ${donnees.publisher} à ${donnees.publisherCity}</p>
                              <p>Édité par ${donnees.editor} </p>
                              <iframe src="${donnees.url}" width="500" height="500"></iframe>
                              <br>
                              <p>Droits attribués ${donnees.rights}</p>`

                        if (!$('#info').is(':empty')) {
                            $('#info').empty()
                        }
                        if ($('#format').is(':checked')) {
                            $('#info').append('<br><pre><code>' + htmlJSON + '</code></pre>')
                        } else {
                            $('#info').append(html)
                        }

                    });
            });
        });
    </script>
    <label for="format">json</label>
    <input type="checkbox" name="format" id="format" value="json">
    <div id="info"></div> -->
</body>

</html>