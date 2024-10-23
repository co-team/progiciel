<?php
global $pdo;
require '../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $employe_id = $_POST['employe_id'];
    $salaire = $_POST['salaire'];


    $stmt = $pdo->prepare("INSERT INTO historique_salaires (employe_id, date_changement, salaire) VALUES (?, NOW(), ?)");
    $stmt->execute([$employe_id, $salaire]);
    header("Location: historique_salaire.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Ajouter à l'Historique des Salaires</title>
</head>
<body>
<h1>Ajouter à l'Historique des Salaires</h1>
<form action="ajouter_historique.php" method="POST">
    <label for="employe_id">Employé ID:</label>
    <input type="number" name="employe_id" value="<?= $_GET['id']  ?>" readonly>
    <label for="ancien_salaire"> Salaire:</label>
<!--    --><?php
//    $id = $_GET['id'];
//    $stmt = $pdo->prepare("SELECT * FROM employes WHERE id = ?");
//    $stmt->execute([$id]);
//    $employe = $stmt->fetch(PDO::FETCH_ASSOC);
//    ?>
    <input type="number" name="salaire" step="0.01" required>

    <button type="submit">Ajouter</button>
</form>
<a href="historique_salaire.php">Retour à l'historique des salaires</a>
</body>
</html>

