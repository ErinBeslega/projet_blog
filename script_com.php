<!-- Connexion à notre base de donné dans un fichier isolé pour plus de sécurité -->
<?php
require "connexion.php";

// Script pour afficher les commentaires postés
if (isset($_POST["quelque chose"])){
$requete = " SELECT * from commentaire WHERE id= :version";
$stmt=$db->prepare($requete);
$stmt->execute();
$resultat=$stmt->fetch(PDO::FETCH_ASSOC);
json_decode($resultat);
}
?>