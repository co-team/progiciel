<?php

require '../../config/db.php';
session_start();
if (isset($_SESSION['user_id'])){

    global $pdo;

    $id=$_GET['id'];

    if ($statut ="actif")
        $nouveauetat ="inactif";
    else
        $nouveauetat="actif";

    $requete="UPDATE employes SET statut='".$nouveauetat."' where id='".$id."'";
    //$params=array($nouveauetat,$id);
    $resultat=$pdo->prepare($requete);
    $resultat->execute();
    header('location:afficher_employes.php');

}
else {
    header('location:../utilisateurs/home.php');
}

?>
