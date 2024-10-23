<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "salarie_gestion";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mettre à jour les abonnements expirés
$sql = "UPDATE subscriptions 
        SET statut = 'Expiré' 
        WHERE date_fin < current_date AND statut = 'Actif'";

if ($conn->query($sql) === TRUE) {
    echo "Abonnements expirés mis à jour avec succès.";
} else {
    echo "Erreur lors de la mise à jour : " . $conn->error;
}

$conn->close();
?>

