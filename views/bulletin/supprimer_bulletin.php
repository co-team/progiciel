<?php
global $pdo;
require '../../config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("DELETE FROM bulletins_paie WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: bulletins.php");
}
?>

