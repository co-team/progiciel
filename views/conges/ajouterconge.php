<?php
global $pdo;
require('../../config/db.php');

$employe_id = $_POST['employe_id'];
$type_conge = $_POST['type_conge'];
$date_debut = $_POST['date_debut'];
$date_fin = $_POST['date_fin'];

$sql = "INSERT INTO conges (employe_id, type_conge, date_debut, date_fin) VALUES (:employe_id, :type_conge, :date_debut, :date_fin)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':employe_id' => $employe_id,
    ':type_conge' => $type_conge,
    ':date_debut' => $date_debut,
    ':date_fin' => $date_fin
]);


?>
<html>
<body>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    swal({
        icon: "success",
        title: "damande envoyé !",
        text: "votre demande sera examiné le plutôt possible!",
        showConfirmButton: true,
        confirmButtonText: "Cerrar",
        closeOnConfirm: false
    }). then(function(result){
        window.location = "profilEmployes.php";
    })
</script>

</body></html>
