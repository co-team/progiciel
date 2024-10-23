<?php
global $conn;
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Connexion à la base de données
require_once ('db_my.php');

// Récupérer les informations de l'utilisateur

$user_id = $_SESSION['user_id'];
// Récupérer le type d'abonnement choisi par l'utilisateur
$type_abonnement = $_POST['subscription_type'];

// Récupérer la date d'expiration actuelle du mot de passe
$sql = "SELECT *,`expiry_date` FROM `subscription_keys` WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $current_expiry_date = new DateTime($user['expiry_date']);

    // Prolonger l'abonnement
    if ($type_abonnement == 'Mensuel') {
        $new_expiry_date = $current_expiry_date->modify('+1 month');
    } elseif ($type_abonnement == 'Annuel') {
        $new_expiry_date = $current_expiry_date->modify('+1 year');
    }

    // Mettre à jour la date d'expiration dans la base de données
    $sql_update = "UPDATE subscription_keys SET expiry_date = ?, type_abonnement = ? WHERE id = ?";
    $stmt_update = $conn->prepare($sql_update);
    $stmt_update->bind_param("ssi", $new_expiry_date->format('Y-m-d'), $type_abonnement, $id);

    if ($stmt_update->execute()) {
        echo "Votre abonnement a été prolongé jusqu'au " . $new_expiry_date->format('Y-m-d') . ".";
        // Redirection vers le tableau de bord après la mise à jour
        header('Location: dashboard.php');
        exit();
    } else {
        echo "Erreur lors de la mise à jour de l'abonnement : " . $conn->error;
    }
} else {
    echo "Utilisateur non trouvé.";
}

$stmt->close();
$conn->close();
?>
