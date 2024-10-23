<?php
// ajouter_contrat.php
global $pdo;
require '../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $employe_id = $_POST['employe_id'];
    $type_contrat = $_POST['type_contrat'];

    $date_fin = !empty($_POST['date_fin']) ? $_POST['date_fin'] : null; // La date de fin peut être null pour un CDI
   // $salaire = $_POST['salaire'];
    $statut = $_POST['statut'];

    // Insertion du contrat dans la base de données
    $sql = "INSERT INTO contrats (employe_id, type_contrat, date_fin, statut) 
            VALUES (:employe_id, :type_contrat, :date_fin, :statut)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':employe_id' => $employe_id,
        ':type_contrat' => $type_contrat,

        ':date_fin' => $date_fin,
        ':statut' => $statut
    ]);

    echo "Contrat ajouté avec succès!";
}
?>
