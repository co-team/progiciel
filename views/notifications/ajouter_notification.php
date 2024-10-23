<?php
global $pdo;
require '../../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'];
    $message = $_POST['message'];

    $stmt = $pdo->prepare("INSERT INTO notifications (titre, message, date) VALUES (?, ?, NOW())");
    $stmt->execute([$titre, $message]);
    header("Location: notifications.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Ajouter une Notification</title>
</head>
<body>
<h1>Ajouter une Notification</h1>
<form action="ajouter_notification.php" method="POST">
    <label for="titre">Titre:</label>
    <input type="text" name="titre" required>
    <label for="message">Message:</label>
    <textarea name="message" required></textarea>
    <button type="submit">Ajouter</button>
</form>
<a href="notifications.php">Retour à la liste des notifications</a>
</body>
</html>

