<?php
// Connexion à la base de données
global $conn;
require_once ('db_my.php');

// Récupérer les données (id de l'utilisateur à mettre à jour et les nouvelles données)
$user_id = $_POST['user_id'];  // L'ID de l'utilisateur à mettre à jour
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$sexe = $_POST['sexe'];
$date_naissance = $_POST['date_naissance'];
$statut = $_POST['statut'];

// Requête SQL pour mettre à jour les informations de l'utilisateur
$sql = "UPDATE users 
        SET nom = ?, prenom = ?, email = ?, telephone = ?, sexe = ?, date_naissance = ?, statut = ?
        WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssssi", $nom, $prenom, $email, $telephone, $sexe, $date_naissance, $statut, $user_id);

if ($stmt->execute()) {
    echo "Les informations de l'utilisateur ont été mises à jour avec succès.";
} else {
    echo "Erreur lors de la mise à jour : " . $conn->error;
}

// Fermer la connexion
$stmt->close();
$conn->close();
?>

