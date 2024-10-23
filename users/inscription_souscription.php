<?php
// Connexion à la base de données
global $conn;
require_once ('db_my.php');

// Récupérer les données du formulaire
$user_id = $_POST['user_id'];
$type_abonnement = $_POST['type_abonnement'];

// Récupérer les informations de l'utilisateur
$sql_user = "SELECT * FROM users WHERE id = ?";
$stmt_user = $conn->prepare($sql_user);
$stmt_user->bind_param("i", $user_id);
$stmt_user->execute();
$result_user = $stmt_user->get_result();

if ($result_user->num_rows > 0) {
    $user = $result_user->fetch_assoc();

    // Définir les dates de début et de fin de l'abonnement
    $date_debut = new DateTime();
    if ($type_abonnement == 'Mensuel') {
        $date_fin = $date_debut->modify('+1 month');
    } elseif ($type_abonnement == 'Annuel') {
        $date_fin = $date_debut->modify('+1 year');
    }

    // Insérer les données dans la table subscriptions
    $sql_subs = "INSERT INTO subscriptions (user_id, type_abonnement,categorie, date_debut, date_fin) VALUES (?, ?, ?, ?,?)";
    $stmt_subs = $conn->prepare($sql_subs);
    $date_debut->format('Y-m-d');
    $stmt_subs->bind_param("isss", $user_id, $type_abonnement, $date_fin->format('Y-m-d'));

    if ($stmt_subs->execute()) {
        echo "Abonnement créé avec succès pour l'utilisateur ID : " . $user_id . ".<br>";

        // Générer une clé d'abonnement aléatoire
        $subscription_key = bin2hex(random_bytes(16));

        // Insérer la clé dans la table subscription_keys
        $sql_key = "INSERT INTO subscription_keys (user_id, subscription_key, expiry_date) VALUES (?, ?, ?)";
        $stmt_key = $conn->prepare($sql_key);
        $stmt_key->bind_param("iss", $user_id, $subscription_key, $date_fin->format('Y-m-d'));

        if ($stmt_key->execute()) {
            echo "Clé d'abonnement générée : " . $subscription_key . ".<br>";
        } else {
            echo "Erreur lors de la génération de la clé d'abonnement : " . $conn->error;
        }
    } else {
        echo "Erreur lors de la création de l'abonnement : " . $conn->error;
    }
} else {
    echo "Utilisateur non trouvé.";
}

$stmt_user->close();
$stmt_subs->close();
$stmt_key->close();
$conn->close();
?>

