<?php
// Connexion à la base de données
global $conn;
require_once ('db_my.php');
// Récupérer les données envoyées en POST
$user_id = $_POST['user_id'];
$nouvelle_date_fin = $_POST['nouvelle_date_fin'];

// Mettre à jour la date de fin de l'abonnement
$sql = "UPDATE subscriptions SET date_fin = ? WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $nouvelle_date_fin, $user_id);

if ($stmt->execute()) {
    echo "Abonnement mis à jour avec succès.";
} else {
    echo "Erreur lors de la mise à jour : " . $conn->error;
}

$stmt->close();
$conn->close();
?>

