<?php
global $pdo;
session_start();
$userId = $_SESSION['user_id']; // Supposons que l'utilisateur soit connecté

// Connexion à la base de données
require_once ('../config/db.php');


// Vérifier l'état de l'abonnement
$sql = "SELECT statut FROM subscriptions WHERE user_id = :userId LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([':userId' => $userId]);

$subscription = $stmt->fetch(PDO::FETCH_ASSOC);

// Si l'utilisateur n'a pas d'abonnement
if (!$subscription) {
    echo json_encode(['Actif' => false]);
    exit;
}

// Retourner l'état de l'abonnement en JSON
echo json_encode(['statut' => $subscription['statut']]);
?>

