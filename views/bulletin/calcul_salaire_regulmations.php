<?php
// calcul_salaire_regulations.php
global $pdo;
require('../../config/db.php');

function calculerSalaireNet($salaireBrut, $tauxImposition, $tauxCotisationSociale) {
    $impot = $salaireBrut * ($tauxImposition / 100);
    $cotisations = $salaireBrut * ($tauxCotisationSociale / 100);
    return $salaireBrut - $impot - $cotisations;
}

$employe_id = $_GET['id'];
$sql = "SELECT employes.*, taxes.taux_imposition, taxes.taux_cotisation_sociale 
        FROM employes 
        JOIN taxes ON employes.pays = taxes.pays 
        WHERE employes.id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $employe_id]);
$employe = $stmt->fetch();

$salaireNet = calculerSalaireNet($employe['salaire_brut'], $employe['taux_imposition'], $employe['taux_cotisation_sociale']);

echo "Salaire net : " . $salaireNet . " EUR.";
?>

