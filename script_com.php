
<?php

require "connexion.php";

if (isset($_POST["quelque chose"])){
$requete = " SELECT * from commentaire WHERE id= :version";
$stmt=$db->prepare($requete);
// $stmt->bindValue(':version',$_POST["version"],PDO::PARAM_INT);
$stmt->execute();
$resultat=$stmt->fetch(PDO::FETCH_ASSOC);
json_decode($resultat);
}
?>