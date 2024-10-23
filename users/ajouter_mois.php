<?php
session_start();
$user_id = $_SESSION['user_id'];

//global $conn;
//require_once ('db_my.php');
//$request="UPDATE subscriptions SET date_fin = DATE_ADD(date_fin, INTERVAL 1 MONTH) WHERE user_id = '".$user_id."'";
//$response=mysqli_query($conn,$request);
//$stmt=$conn->prepare($request);
//$stmt->execute();
?>
<?php
// Connexion à la base de données
global $conn;
require_once ('db_my.php');
// Récupérer les données envoyées en POST
$sql = "SELECT *,date_fin FROM subscriptions WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$date_fin=$user['date_fin'];
$nouvelle_date_fin=new DateTime($date_fin);
$nouvelle_date_fin ->modify('+ 1 month');
$nouvelle_date_fin->format('Y-m-d');
// Mettre à jour la date de fin de l'abonnement
// Convertir la chaîne en objet DateTime
$date_obj = new DateTime($date_fin);

// Ajouter 1 mois
$date_obj->modify('+1 month');

// Formater la nouvelle date pour la mise à jour dans la base de données
$nouvelle_date_fin = $date_obj->format('Y-m-d');

// Exemple de requête pour mettre à jour dans la base de données
$sql = "UPDATE subscriptions SET date_fin = ? WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $nouvelle_date_fin, $user_id);

if ($stmt->execute()) {
    echo "Date de fin mise à jour avec succès : " . $nouvelle_date_fin;
} else {
    echo "Erreur lors de la mise à jour.";
}

$stmt->close();
$conn->close();
?>

<script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>


<script>
    function ajouterTemps(typeSouscription, dateFinId, userId) {
        let dateFinInput = document.getElementById(dateFinId);
        let dateFin = new Date(dateFinInput.value);

        if (isNaN(dateFin.getTime())) {
            alert("Date non valide");
            return;
        }

        if (typeSouscription === 'Mensuel') {
            dateFin.setMonth(dateFin.getMonth() + 1);
        } else if (typeSouscription === 'Annuel') {
            dateFin.setFullYear(dateFin.getFullYear() + 1);
        }

        let nouvelleDateFin = dateFin.toISOString().split('T')[0];
        dateFinInput.value = nouvelleDateFin;

        // Envoyer la nouvelle date via AJAX à un script PHP
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "ajouter_mois.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert("Abonnement mis à jour avec succès !");
            }
        };
        xhr.send("user_id=" + userId + "&nouvelle_date_fin=" + nouvelleDateFin);
    }
</script>

