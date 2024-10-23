<?php
require '../../config/db.php';
require_once '../../public/composants/body_header.php';
require_once ("../../public/composants/footer.php");
// Récupérer l'historique des salaires
function getHistoriqueSalaires(): bool|array
{
    global $pdo;
    $stmt = $pdo->query("SELECT *, em.nom,em.prenom,em.poste FROM historique_salaires INNER JOIN employes em ON em.id = historique_salaires.employe_id");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$historique_salaires = getHistoriqueSalaires();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Historique des Salaires</title>
</head>
<body>
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
<h1>Historique des Salaires</h1>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Employé Nom</th>
        <th>Employé Prénom</th>
        <th>Poste</th>
        <th>Ancien Salaire</th>
        <th>Nouveau Salaire</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php

    foreach ($historique_salaires as $historique):

        ?>
        <tr>
            <td><?= htmlspecialchars($historique['id']); ?></td>
            <td><?= htmlspecialchars($historique['nom']); ?></td>
            <td><?= htmlspecialchars($historique['prenom']); ?></td>
            <td><?= htmlspecialchars($historique['poste']); ?></td>
            <td><?= htmlspecialchars($historique['salaire_brut']); ?></td>
            <td><?= htmlspecialchars($historique['salaire']); ?> EUR</td>
            <td><?= htmlspecialchars($historique['date_changement']); ?></td>

            <td>
                <a href="supprimer_historique.php?id=<?= $historique['id']; ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a href="../index.php">Retour à l'accueil</a>
</body>
</html>

