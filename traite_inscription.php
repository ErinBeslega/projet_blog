<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>traite_inscription</title>
</head>
<body>
<?php 
        $login=$_POST["login"];
        $password=$_POST["password"];
        $password=password_hash($password,PASSWORD_DEFAULT);
        $link = new PDO('mysql:host=localhost;dbname=projet_blog', 'root', '', array
        (PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
       
        $sql="INSERT INTO `utilisateurs` (`id_user`,'login', `mot_de_passe`) VALUES ( NULL, '$login', '$password');";
        // $v=$link->query($sql);
    ?>
</body>
</html>