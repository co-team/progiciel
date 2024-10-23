<?php
// ajouter_utilisateur.php
global $pdo;
require '../../config/db.php'; // Fichier de connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $departement = $_POST['departement'];

    // Vérifie si le nom d'utilisateur est déjà pris
    $sql_check = "SELECT COUNT(*) FROM utilisateurs WHERE username = :username";
    $stmt_check = $pdo->prepare($sql_check);
    $stmt_check->execute([':username' => $username]);
    $count = $stmt_check->fetchColumn();

    if ($count > 0) {
        echo "Le nom d'utilisateur est déjà pris.";
    } else {
        // Hachage sécurisé du mot de passe
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Insertion dans la base de données
        $sql = "INSERT INTO utilisateurs (username, password, role,departement) VALUES (:username, :password, :role,:departement)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':username' => $username,
            ':password' => $hashed_password,
            ':role' => $role,
            ':departement' => $departement
        ]);
echo "Utilasteur ajouté";

    }
    ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal({
            icon: "success",
            title: "bon travail !",
            text: " L'utilisateur a bein été ajouter !",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
        }). then(function(result){
            window.location = "inscription.php";
        })
    </script>

    <?php
}
?>
