<?php
    // Détruire les informations de l'utilisateur dans le tableau lors de la déconnection
    session_start();
    session_destroy();
    $_SESSION=array();
    header('Location: login.php');
    die();
?>