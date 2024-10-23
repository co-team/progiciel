<?php
global $pdo;
require '../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $employe_id = $_POST['employe_id'];
    $date_paie = $_POST['date_paie'];
    $cotisations = $_POST['cotisations'];
    $salaire_brut = $_POST['salaire_brut'];

    $stmt = $pdo->prepare("UPDATE bulletins_paie SET employe_id = ?, date_paie = ?, cotisations = ?, salaire_brut = ? WHERE id = ?");
    $stmt->execute([$employe_id, $date_paie, $cotisations, $salaire_brut, $id]);
    header("Location: bulletins.php");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM bulletins_paie WHERE id = ?");
    $stmt->execute([$id]);
    $bulletin = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Modifier un Bulletin de Salaire</title>
</head>
<body>
<h1>Modifier un Bulletin de Salaire</h1>
<form action="modifier_bulletin.php" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($bulletin['id']); ?>">
    <label for="employe_id">Employé ID:</label>
    <input type="number" name="employe_id" value="<?= htmlspecialchars($bulletin['employe_id']); ?>" required>
    <label for="mois">Mois:</label>
    <input type="text" name="date_paie" value="<?= htmlspecialchars($bulletin['date_paie']); ?>" required>
    <label for="annee">Année:</label>
    <input type="number" name="cotisations" value="<?= htmlspecialchars($bulletin['cotisations']); ?>" required>
    <label for="salaire_brut">Salaire Brut:</label>
    <input type="number" name="salaire_brut" step="0.01" value="<?= htmlspecialchars($bulletin['salaire_brut']); ?>" required>
    <button type="submit">Mettre à Jour</button>
</form>
<a href="bulletins.php">Retour à la liste des bulletins</a>
</body>
</html>

