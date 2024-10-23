<?php
// calculer_salaire.php
global $pdo;
require '../../config/db.php';

function calculerSalaireNet($salaireBrut, $cotisations) {
    return $salaireBrut - ($salaireBrut * $cotisations / 100);
}

$employe_id = $_GET['id'];  // Obtenez l'ID de l'employé depuis l'URL
$sql = "SELECT * FROM employes WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $employe_id]);
$employe = $stmt->fetch();

$cotisations = 25;  // Exemple de taux de cotisation
$salaireNet = calculerSalaireNet($employe['salaire_brut'], $cotisations);

// Insertion dans la table des bulletins de paie
$sql = "INSERT INTO bulletins_paie (employe_id, date_paie, salaire_brut, cotisations, salaire_net) VALUES (:employe_id, NOW(), :salaire_brut, :cotisations, :salaire_net)";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':employe_id' => $employe_id,
    ':salaire_brut' => $employe['salaire_brut'],
    ':cotisations' => $cotisations,
    ':salaire_net' => $salaireNet
]);

echo "Salaire net de " . $employe['nom'] . " " . $employe['prenom'] . " est de " . $salaireNet . " EUR.";
?>
