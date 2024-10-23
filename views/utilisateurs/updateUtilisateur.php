<?php
global $pdo;
require '../../config/db.php';
require '../../config/employes.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $role = $_POST['role'];


    updateUser($id, $username, $role);
    ?>
    <html>
    <body>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        swal({
            icon: "success",
            title: "bon travail !",
            text: "l'utilisateur a été modifié avec succès!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar",
            closeOnConfirm: false
        }). then(function(result){
            window.location = "utilisateurs.php";
        })
    </script>

    </body></html>
    <?php
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM utilisateurs WHERE id = ?");
    $stmt->execute([$id]);
    $employe = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Modifier un Employé</title>
</head>
<body>
<h1>Modifier un Employé</h1>
<form action="updateUtilisateur.php" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($employe['id']); ?>">
    <label for="username">Nom:</label>
    <input type="text" name="username" value="<?= htmlspecialchars($employe['username']); ?>" required>
    <label for="role">Role:</label>
    <input type="text" name="role" value="<?= htmlspecialchars($employe['role']); ?>" required>
    <button type="submit">Mettre à Jour</button>
</form>
<a href="updateUtilisateur.php">Retour à la liste des utilisateurs</a>
</body>
</html>