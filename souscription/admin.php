
<?php
require_once 'sidebar1.php';
// Connexion à la base de données
require_once ('../users/db_my.php');

// Mise à jour du statut de l'utilisateur ou de l'abonnement
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_status'])) {
    $subscription_id = $_POST['subscription_id'];
    $new_status = $_POST['statut'];
    global$conn;
    $sql = "UPDATE subscriptions SET statut='$new_status' WHERE id='$subscription_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Statut mis à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour: " . $conn->error;
    }
}

// Récupérer la liste des utilisateurs et leurs abonnements
$sql = "SELECT users.id AS user_id, users.nom, users.prenom, users.email, subscriptions.id AS subscription_id, subscriptions.categorie, subscriptions.type_abonnement, subscriptions.date_debut, subscriptions.date_fin, subscriptions.statut
        FROM users
        JOIN subscriptions ON users.id = subscriptions.user_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestion des abonnements</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="../public/css/fa.css">
</head>
<body>
<h1 class="text-white">Gestion des abonnements</h1>

<table border="1">
    <tr>
        <th>ID Utilisateur</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Catégorie</th>
        <th>Type d'abonnement</th>
        <th>Date de début</th>
        <th>Date de fin</th>
        <th>Statut</th>
        <th>Action</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['user_id'] . "</td>";
            echo "<td>" . $row['nom'] . " " . $row['prenom'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['categorie'] . "</td>";
            echo "<td>" . $row['type_abonnement'] . "</td>";
            echo "<td>" . $row['date_debut'] . "</td>";
            echo "<td>" . $row['date_fin'] . "</td>";
            echo "<td>" . $row['statut'] . "</td>";
            echo "<td>
                    <a href='cron_jobber.php?" . $row['date_fin'] . " < " . date("Y/m/d") . "'>verification</a>           
                    <form method='post'>
                        <input type='hidden' name='subscription_id' value='" . $row['subscription_id'] . "'>
                        <select name='statut'>
                            <option value='Actif'" . ($row['statut'] == 'Actif' ? ' selected' : '') . ">Actif</option>
                            <option value='Expiré'" . ($row['statut'] == 'Expiré' ? ' selected' : '') . ">Expiré</option>
                            <option value='Annulé'" . ($row['statut'] == 'Annulé' ? ' selected' : '') . ">Annulé</option>
                        </select>
                        <button type='submit' name='update_status'>Mettre à jour</button>
                       
                    </form>
                </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='9'>Aucun utilisateur trouvé.</td></tr>";
    }
    ?>
</table>
<a onclick="history.back();"  class="mb-5"><i class="fas fa-angle-left arrow fa-3dicon fa-5x "></i></a>
</body>
</html>

<?php
require_once '../public/composants/sidefooter.php';
$conn->close();
?>
