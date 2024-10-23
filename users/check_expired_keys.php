<?php
// Connexion à la base de données
global $conn;
require_once ('db_my.php');

$current_date = new DateTime();

// Requête pour récupérer les clés expirées
$sql = "SELECT * FROM subscription_keys WHERE expiry_date <= ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $current_date->format('Y-m-d H:i:s'));
$stmt->execute();
$result = $stmt->get_result();

while ($row = $result->fetch_assoc()) {
    $user_id = $row['user_id'];
    // Vous pouvez envoyer une notification à l'utilisateur ou désactiver son compte
    echo "La clé pour l'utilisateur $user_id a expiré.";
}

$stmt->close();
$conn->close();
?>
