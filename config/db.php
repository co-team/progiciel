<?php
// db.php
$host = 'localhost';
$db   = 'salarie_gestion';
$user = 'root'; // Remplacez par votre utilisateur
$pass = '';     // Remplacez par votre mot de passe

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}
?>
