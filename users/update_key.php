<?php
// Générer une nouvelle clé d'abonnement unique
global $conn;
require_once ('db_my.php');
$new_subscription_key = bin2hex(random_bytes(16));

// Mettre à jour la clé d'abonnement dans la base de données
$sql_key_update = "UPDATE subscription_keys SET subscription_key = ?, expiry_date = ? WHERE user_id = ?";
$stmt_key_update = $conn->prepare($sql_key_update);
$stmt_key_update->bind_param("ssi", $new_subscription_key, $new_expiry_date->format('Y-m-d'), $user_id);

if ($stmt_key_update->execute()) {
echo "Nouvelle clé d'abonnement générée : " . $new_subscription_key;
} else {
echo "Erreur lors de la mise à jour de la clé d'abonnement.";
}

$stmt_key_update->close();

