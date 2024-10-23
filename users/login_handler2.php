<?php
global $conn;
session_start();  // Pour stocker les informations de session de l'utilisateur

// Connexion à la base de données
require_once ('db_my.php');

// Récupérer les données du formulaire
$email = $_POST['email'];
$password = $_POST['password'];
$subscription_key = $_POST['subscription_key'];

// Vérifier les identifiants de l'utilisateur
$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Vérification du mot de passe (supposons que les mots de passe sont hashés)
    if (password_verify($password, $user['password'])) {
        $user_id = $user['id'];

        // Vérifier si la clé d'abonnement est valide
        $current_date = new DateTime();
        $sql_key = "SELECT * FROM subscription_keys WHERE subscription_key = ? AND user_id = ? AND expiry_date > ?";
        $stmt_key = $conn->prepare($sql_key);
        $stmt_key->bind_param("sis", $subscription_key, $user_id, $current_date->format('Y-m-d H:i:s'));
        $stmt_key->execute();
        $result_key = $stmt_key->get_result();

        if ($result_key->num_rows > 0) {
            // Connexion réussie, démarrer la session
            $_SESSION['user_id'] = $user_id;
            $_SESSION['email'] = $user['email'];

            echo "Connexion réussie. Bienvenue, " . $user['prenom'] . "! Votre clé d'abonnement est valide.";
            // Redirection vers la page d'accueil ou le tableau de bord
            header('Location: dashboard.php');
            exit();
        } else {
            // Clé d'abonnement invalide ou expirée
            echo "Erreur : clé d'abonnement invalide ou expirée.";
        }
    } else {
        // Mot de passe incorrect
        echo "Erreur : mot de passe incorrect.";
    }
} else {
    // L'utilisateur n'existe pas
    echo "Erreur : utilisateur non trouvé.";
}

$stmt->close();
$conn->close();
?>
