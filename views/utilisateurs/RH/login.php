<?php
global $pdo;
session_start();
require '../../../config/db.php';
//require '../../config/employes.php';
//require_once('../../../public/composants/body_header.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM utilisateurs WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['departement'] = $user['departement'];
        header('Location:dashbaord.php');
    } else {
        echo "Identifiants incorrects.";

    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Connexion</title></head>
<body>
<h2>Connexion</h2>
<form method="POST" action="connexion.php">
    Nom d'utilisateur: <input type="text" name="username" required><br>
    Mot de passe: <input type="password" name="password" required><br>
    <button type="submit">Se connecter</button>
</form>
</body>
</html>
