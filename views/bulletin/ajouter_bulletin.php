<?php
global $pdo;
require '../../config/db.php';

// calculer_salaire.php


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
?>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
    }
    th, td {
        padding: 10px;
        text-align: left;
    }
</style>
<?php
echo "<h1>Bulletin de salaire de " .  $employe['nom'] . "</h1>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Nom</th><th>Prénom</th><th>Salaire Net</th></tr>";


    echo "<tr>";
    echo "<td>" . $employe['id'] . "</td>";
    echo "<td>" .  $employe['nom'] . "</td>";
    echo "<td>" . $employe['prenom'] . "</td>";
    echo "<td>" .  $salaireNet ." EUR </td>";
//    echo "<td>" . $vehicule['immatriculation'] . "</td>";
//    echo "<td>" . $vehicule['vignette_carbone'] . " g/km</td>";
//    echo "<td>" . $vehicule['caracteristiques'] . "</td>";
    echo "</tr>";

echo "</table>";
?>

