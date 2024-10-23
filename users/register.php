<?php
// Connexion à la base de données
global $conn;
require_once ('db_my.php');

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
$date_naissance = $_POST['date_naissance'];
$sexe = $_POST['sexe'];
$categorie = $_POST['categorie'];
$type_abonnement = $_POST['type_abonnement'];
$prix = $_POST['prix'];

// Calculer la date de fin en fonction du type d'abonnement
$date_debut = date('Y-m-d');
$date_fin = ($type_abonnement == 'Mensuel') ? date('Y-m-d', strtotime('+1 month')) : date('Y-m-d', strtotime('+1 year'));

// Insérer les données dans la table `users`
$sql = "INSERT INTO users (nom, prenom, telephone, email, mot_de_passe, date_naissance, sexe, statut) 
        VALUES ('$nom', '$prenom', '$telephone', '$email', '$mot_de_passe', '$date_naissance', '$sexe', 'Actif')";

if ($conn->query($sql) === TRUE) {
    $user_id = $conn->insert_id;

    // Insérer l'abonnement dans la table `subscriptions`
    $sql_subscription = "INSERT INTO subscriptions (user_id, categorie, type_abonnement, date_debut, date_fin,prix) 
                         VALUES ('$user_id', '$categorie', '$type_abonnement', '$date_debut', '$date_fin','$prix')";

    if ($conn->query($sql_subscription) === TRUE) {
        // Démarrer la session et stocker les informations utilisateur
        session_start();
        $_SESSION['user_id'] = $user_id;

        // Rediriger vers la page de profil
        header("Location: profil.php");
        exit();
    } else {
        echo "Erreur lors de l'enregistrement de l'abonnement : " . $conn->error;
    }
} else {
    echo "Erreur lors de l'enregistrement de l'utilisateur : " . $conn->error;
}

$conn->close();
?>
