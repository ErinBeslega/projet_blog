<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon blog / Accueil</title>
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
    <div id="info"></div>



</body>

</html>