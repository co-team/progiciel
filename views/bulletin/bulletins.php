<?php
session_start();
require '../../config/db.php';
require_once '../../public/composants/sidebar.php';
// Redirige vers la page de connexion si l'utilisateur n'est pas authentifié
if (!isset($_SESSION['user_id'])) {
    ob_start();
    header('Location:../utilisateurs/connexion.php');
    ob_get_clean();
    exit;
}

// Récupération des informations de l'utilisateur connecté
$user_role = $_SESSION['role']; // Rôle de l'utilisateur (Admin, RH, Employe)
$user_id = $_SESSION['user_id'];
$departement = $_SESSION['departement'];



// Récupérer la liste des bulletins de salaire
function getBulletins() {
    global $pdo;
    $stmt = $pdo->query("SELECT *,nom FROM bulletins_paie INNER JOIN departements ON departements.id=bulletins_paie.employe_id WHERE departements.id='".$departement."'");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$bulletins = getBulletins();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
    <title>Bulletins de Salaire</title>
</head>
<body>
<h1 class="text-white">Bulletins de Salaire</h1>
<a href="../employe/afficher_employes.php" class="btn btn-outline-success">Ajouter un Bulletin</a>
<table style="margin-top: 15px" data-aos="zoom-out-up">
    <thead>
    <tr>
        <th>ID</th>
        <th>Employé ID</th>
        <th>Date_Paie</th>
        <th>Cotisations</th>
        <th>Salaire Brut</th>
        <th>Salaire Net</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($bulletins as $bulletin): ?>
        <tr>
            <td><?= htmlspecialchars($bulletin['id']); ?></td>
            <td><?= $bulletin['employe_id']; ?></td>
            <td><?= htmlspecialchars($bulletin['date_paie']); ?></td>
            <td><?= htmlspecialchars($bulletin['cotisations']); ?></td>
            <td><?= $bulletin['salaire_brut']; ?> EUR</td>
            <td><?= htmlspecialchars($bulletin['salaire_net']); ?> EUR</td>
            <td>

                <a href="modifier_bulletin.php?id=<?= $bulletin['id']; ?>" class="btn btn-warning">Modifier</a>
                <a href="supprimer_bulletin.php?id=<?= $bulletin['id']; ?>" class="btn btn-danger">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a onclick="history.back();"  class="mb-5"><i class="fas fa-angle-left arrow fa-3dicon fa-5x"></i></a>
<?php
require_once ("../../public/composants/sidefooter.php");

