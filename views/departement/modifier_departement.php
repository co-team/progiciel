<?php
global $pdo;
require '../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $responsable = $_POST['responsable'];

    $stmt = $pdo->prepare("UPDATE departements SET nom = ?, responsable = ? WHERE id = ?");
    $stmt->execute([$nom, $responsable, $id]);
    header("Location: departements.php");
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM departements WHERE id = ?");
    $stmt->execute([$id]);
    $departement = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Modifier un Département</title>
</head>
<body>
<h1>Modifier un Département</h1>
<form action="modifier_departement.php" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($departement['id']); ?>">
    <label for="nom">Nom:</label>
    <input type="text" name="nom" value="<?= htmlspecialchars($departement['nom']); ?>" required>
    <label for="responsable">Responsable:</label>
    <input type="text" name="responsable" value="<?= htmlspecialchars($departement['responsable']); ?>" required>
    <button type="submit">Mettre à Jour</button>
</form>
<a href="departements.php">Retour à la liste des départements</a>
</body>
</html>

