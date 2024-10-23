<?php
session_start();
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "salarie_gestion";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
var_dump(Date("Y-m-d"));
// Récupérer les données du formulaire de connexion
$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];

// Vérifier si l'utilisateur existe
$sql = "SELECT *,date_fin FROM users INNER JOIN subscriptions ON subscriptions.user_id = users.id WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();



    // Vérifier le mot de passe
    if (password_verify($mot_de_passe, $user['mot_de_passe'])) {
        // Vérifier si le mot de passe est expiré
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['categorie']= $user['categorie'];
        $current_date = new DateTime();
        $date_fin = new DateTime($user['date_fin']);
        var_dump($current_date);
        var_dump($date_fin);
        if ($current_date > $date_fin) {

            echo "Votre mot de passe a expiré. Veuillez le changer.";
            // Rediriger vers la page de changement de mot de passe
            header('Location: warning.php');
        } else {
            // Connexion réussie
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['categorie']= $user['categorie'];

            echo "Connexion réussie !";
            // Rediriger vers le tableau de bord
            header('Location: profil.php');
        }
    } else {
        echo "Erreur : mot de passe incorrect.";
    }
} else {
    echo "Erreur : utilisateur non trouvé.";
}

$stmt->close();
$conn->close();
?>
