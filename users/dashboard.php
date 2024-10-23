<?php
global $conn;
session_start();

if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: login.html');
    exit();
}

// Connexion à la base de données
require_once ('db_my.php');
$id=$_GET['id'];
// Récupérer les informations de l'utilisateur
//$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Récupérer la clé d'abonnement de l'utilisateur
$sql_key = "SELECT * FROM subscription_keys WHERE user_id = ?  LIMIT 1";

$stmt_key = $conn->prepare($sql_key);
$stmt_key->bind_param("i", $user_id);
$stmt_key->execute();
$result_key = $stmt_key->get_result();
$key_info = $result_key->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord</title>
</head>
<body>
<h2>Bienvenue, <?php echo $user['prenom']; ?> !</h2>

<p>Email : <?php echo $user['email']; ?></p>

<p>Clé d'abonnement : <?php echo $key_info['subscription_key']; ?></p>
<p>Date d'expiration : <?php echo $key_info['expiry_date']; ?></p>

<a href="logout.php">Se déconnecter</a>
</body>
</html>

<?php
$stmt->close();
$conn->close();
?>

