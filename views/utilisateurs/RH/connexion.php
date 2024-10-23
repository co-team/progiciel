<?php
global $pdo;
session_start();

// Connexion à la base de données
require '../../../config/db.php';
require '../../../config/employes.php';

// Vérifier si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $departement = $_POST['departement'];

    $sql = "SELECT password, departement FROM utilisateurs WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':username' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['departement'] = $departement;
        header('Location:dashboard.php');
    } else {
        echo "Identifiants incorrects.";

    }
}
?>
