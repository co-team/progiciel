<?php
// Connexion à la base de données
require_once ('db_my.php');
global $conn;
// Récupérer la clé à vérifier
$subscription_key = $_POST['subscription_key'];
$current_date = new DateTime();

// Vérifier si la clé existe et si elle est valide
$sql = "SELECT * FROM subscription_keys WHERE subscription_key = ? AND expiry_date > ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $subscription_key, $current_date->format('Y-m-d H:i:s'));
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "Clé valide. Accès autorisé.";
} else {
    echo "Clé invalide ou expirée.";
}

$stmt->close();
$conn->close();
?>
