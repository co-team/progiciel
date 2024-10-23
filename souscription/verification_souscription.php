<?php
global $pdo;
require_once ('../config/db.php');
// Supposons que la date actuelle est aujourd'hui
$currentDate = date('Y-m-d');

// Récupérer les abonnements expirés
$sql = "SELECT s.id, s.user_id, u.email 
        FROM subscriptions s
        JOIN users u ON s.user_id = u.id
        WHERE s.expiration_date < :currentDate AND s.statut = 'actif'";

$stmt = $pdo->prepare($sql);
$stmt->execute([':currentDate' => $currentDate]);

$expiredSubscriptions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Pour chaque abonnement expiré, désactiver l'autorisation et envoyer une notification
foreach ($expiredSubscriptions as $subscription) {
    // Désactiver l'abonnement
    $updateSql = "UPDATE subscriptions SET statut = 'Expiré' WHERE id = :id";
    $updateStmt = $pdo->prepare($updateSql);
    $updateStmt->execute([':id' => $subscription['id']]);

    // Envoyer une notification par email
    $userEmail = $subscription['email'];
    $subject = "Votre abonnement a expiré";
    $message = "Bonjour, votre abonnement a expiré. Veuillez le renouveler pour continuer à bénéficier de nos services.";
    $headers = "From: support@votreapp.com";

    mail($userEmail, $subject, $message, $headers);

    // Vous pouvez également appeler une fonction JavaScript ici pour envoyer une notification front-end
}
?>
<script>
function sendNotification(title, message) {
if (Notification.permission === "granted") {
new Notification(title, {
body: message,
icon: "https://example.com/icon.png" // Optionnel
});
} else if (Notification.permission !== "denied") {
Notification.requestPermission().then(permission => {
if (permission === "granted") {
new Notification(title, {
body: message
});
}
});
}
}

// Appel de la fonction si nécessaire
sendNotification("Expiration d'abonnement", "Votre abonnement a expiré. Veuillez le renouveler.");

</script>