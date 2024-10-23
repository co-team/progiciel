<?php
// Fonction pour générer une clé unique
global $conn;
function generateSubscriptionKey($length = 20) {
    return bin2hex(random_bytes($length / 2)); // Génère une chaîne aléatoire hexadécimale
}

// Connexion à la base de données
require_once ('db_my.php');


// Récupérer les données de souscription
$user_id = $_POST['user_id'];
$subscription_type = $_POST['subscription_type']; // mensuel, annuel, etc.
$current_date = new DateTime();

// Définir la date d'expiration en fonction du type de souscription
if ($subscription_type == 'mensuel') {
    $expiry_date = $current_date->modify('+1 month');
} elseif ($subscription_type == 'annuel') {
    $expiry_date = $current_date->modify('+1 year');
}

// Générer la clé d'abonnement
$subscription_key = generateSubscriptionKey();

// Insérer la clé dans la base de données
$sql = "INSERT INTO subscription_keys (user_id, subscription_key, subscription_type, expiry_date) 
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("isss", $user_id, $subscription_key, $subscription_type, $expiry_date->format('Y-m-d H:i:s'));

if ($stmt->execute()) {
    echo "Souscription réussie. Votre clé est : " . $subscription_key;
} else {
    echo "Erreur lors de la génération de la clé : " . $conn->error;
}

$stmt->close();
$conn->close();
?>

