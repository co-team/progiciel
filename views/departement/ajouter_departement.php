<?php
global $pdo;
require '../../config/db.php';
 // Connexion à la base de données

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $responsable = $_POST['responsable'];
    $date_creation = $_POST['date_creation'];

    // Vérifier si un fichier a été téléchargé
    if (isset($_FILES['icon']) && $_FILES['icon']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['icon']['tmp_name'];
        $fileName = $_FILES['icon']['name'];
        $fileSize = $_FILES['icon']['size'];
        $fileType = $_FILES['icon']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Extensions autorisées
        $allowedfileExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($fileExtension, $allowedfileExtensions)) {
            // Déplacer le fichier téléchargé vers le dossier des icônes
            $uploadFileDir = '../../public/uploads/icons';
            $dest_path = $uploadFileDir . $fileName;

            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                // Insertion dans la base de données avec le chemin de l'icône
                $sql = "INSERT INTO departements (nom, responsable, date_creation, icon) 
                        VALUES (:nom, :responsable, :date_creation, :icon)";

                $stmt = $pdo->prepare($sql);
                $stmt->execute([
                    ':nom' => $nom,
                    ':responsable' => $responsable,
                    ':date_creation' => $date_creation,
                    ':icon' => $dest_path
                ]);

                echo "Département ajouté avec succès.";
            } else {
                echo "Erreur lors du déplacement du fichier téléchargé.";
            }
        } else {
            echo "Extension de fichier non autorisée. Veuillez télécharger un fichier JPG, JPEG, PNG ou GIF.";
        }
    } else {
        echo "Aucun fichier téléchargé ou erreur lors du téléchargement.";
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Ajouter un Département</title>
</head>
<body>
<h1>Ajouter un Département</h1>

    <form method="POST" action="ajouter_departement.php" enctype="multipart/form-data">
        Nom du département: <input type="text" name="nom" required><br>
        Responsable: <input type="text" name="responsable"><br>
        Date de création: <input type="date" name="date_creation"><br>
        Icône (fichier image): <input type="file" name="icon" accept="image/*" required><br>
        <button type="submit">Ajouter le département</button>
    </form>

<a href="departement.php">Retour à la liste des départements</a>
</body>
</html>
