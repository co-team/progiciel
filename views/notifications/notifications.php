<?php
session_start();
require '../../config/db.php';
require_once ('../../public/composants/sidebar.php');

// Récupérer la liste des notifications
function getNotifications() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM notifications");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$notifications = getNotifications();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
    <title>Notifications</title>
</head>
<body>

<h1 class="text-white">Notifications</h1>
<a href="ajouter_notification.php">Ajouter une Notification</a>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Titre</th>
        <th>Message</th>
        <th>Date</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($notifications as $notification): ?>
        <tr>
            <td><?= htmlspecialchars($notification['id']); ?></td>
            <td><?= htmlspecialchars($notification['titre']); ?></td>
            <td><?= htmlspecialchars($notification['message']); ?></td>
            <td><?= htmlspecialchars($notification['date']); ?></td>
            <td>
                <a href="supprimer_notification.php?id=<?= $notification['id']; ?>">Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a onclick="history.back();"  class="mb-5"><i class="fas fa-angle-left arrow fa-3dicon fa-5x"></i></a>
<?php
require_once ('../../public/composants/secondfooter.php');
?>
</body>
</html>

