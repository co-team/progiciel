<?php
global $pdo;
require '../../config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM historique_salaire WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: historique_salaire.php");
}
?>
