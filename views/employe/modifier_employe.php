<?php
global $pdo;
require '../../config/db.php';
require '../../config/employes.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $poste = $_POST['poste'];
    $salaire_brut = $_POST['salaire_brut'];

    updateEmploye($id, $nom, $prenom, $poste, $salaire_brut);
?>
<html>
<body>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    swal({
        icon: "success",
        title: "bon travail !",
        text: "l'employé modifié avec succès!",
        showConfirmButton: true,
        confirmButtonText: "Cerrar",
        closeOnConfirm: false
    }). then(function(result){
        window.location = "afficher_employes.php";
    })
</script>

</body></html>
<?php
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM employes WHERE id = ?");
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
<form action="modifier_employe.php" method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($employe['id']); ?>">
    <label for="nom">Nom:</label>
    <input type="text" name="nom" value="<?= htmlspecialchars($employe['nom']); ?>" required>
    <label for="prenom">Prénom:</label>
    <input type="text" name="prenom" value="<?= htmlspecialchars($employe['prenom']); ?>" required>
    <label for="poste">Poste:</label>
    <input type="text" name="poste" value="<?= htmlspecialchars($employe['poste']); ?>" required>
    <label for="salaire_brut">Salaire Brut:</label>
    <input type="number" name="salaire_brut" step="0.01" value="<?= htmlspecialchars($employe['salaire_brut']); ?>" required>
    <button type="submit">Mettre à Jour</button>
</form>
<a href="employes.php">Retour à la liste des employés</a>
</body>
</html>

