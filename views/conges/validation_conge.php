<?php

// validation_conge.php
global $pdo;
require('../../config/db.php');

$id = $_GET['id']; // Obtenir l'ID du congé
$statut = "approuvé"; // Approuvé ou refusé

$sql = "UPDATE conges SET statut ='".$statut."' WHERE id = '".$id."'";
$stmt = $pdo->prepare($sql);
$stmt->execute();

?>
<html>
<body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    swal({
        icon: "success",
        title: "congé accepté !",
        text: "Un message a été envoyé à l'employé!",
        showConfirmButton: true,
        confirmButtonText: "Cerrar",
        closeOnConfirm: false
    }). then(function(result){
        window.location = "congesdemandes.php";
    })
</script>
</body></html>

