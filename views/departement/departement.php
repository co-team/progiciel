<?php
require '../../config/db.php';
require_once ('../../public/composants/sidebar.php');
// Récupérer la liste des départements
function getDepartements() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM departements");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$departements = getDepartements();
?>

<link rel="stylesheet" href="../../public/css/style.css">
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
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Liste des Départements</title>
</head>
<body>
<h1 class="text-white">Liste des Départements</h1>
<a href="ajouter_departement.php" class="btn btn-outline-success mb-3">Ajouter un Département</a>
<table data-aos="zoom-out-up">
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Responsable</th>
        <th>Icône</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($departements as $departement): ?>
        <tr>
            <td><?= htmlspecialchars($departement['id']); ?></td>
            <td><?= htmlspecialchars($departement['nom']); ?></td>
            <td><?= htmlspecialchars($departement['responsable']); ?></td>
            <td><img src="<?= $departement['icon']; ?>" alt="Icône" width="50"></td>
            <td>
                <a href="modifier_departement.php?id=<?= $departement['id']; ?>" class="btn btn-warning">Modifier</a>
                <a href="supprimer_departement.php?id=<?= $departement['id']; ?>" class="btn btn-danger">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a onclick="history.back();"><i class="fas fa-angle-left arrow fa-3dicon fa-5x"></i></a>
</body>
<?php
require_once ('../../public/composants/sidefooter.php');
?>
</html>
