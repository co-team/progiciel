<?php
global $pdo;
session_start();
//$departement = $_SESSION['departement'];
require '../../config/db.php';
require '../../config/employes.php';
require_once ('../../public/composants/body_header.php');
$employes = getEmployes();
$result = "SELECT *,departements.id as departe,departements.nom as depart FROM utilisateurs INNER JOIN departements ON departements.id=utilisateurs.departement ";
$requete = $pdo->query($result);
$resultats = $requete->fetchAll();
foreach ($resultats as $resultat) {
    $depart= $resultat['depart'];
}
?>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Employés</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>

<h1>Liste des Employés</h1>
<a href="ajouter_employe.php" class="btn btn-outline-success mb-3">Ajouter un Employé</a>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Poste</th>
        <th>Salaire Brut</th>
        <th>Type Contrat</th>
        <th>Statut</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($employes as $employe):
        $res = substr($employe["nom"], 0, 4);
        ?>

        <tr>
            <td><?=$res , htmlspecialchars($employe['id']); ?>0026SILOTEC</td>
            <td><?= htmlspecialchars($employe['nom']); ?></td>
            <td><?= htmlspecialchars($employe['prenom']); ?></td>
            <td><?= htmlspecialchars($employe['poste']); ?></td>
            <td><?= htmlspecialchars($employe['salaire_brut']); ?> EUR</td>
            <td><?= htmlspecialchars($employe['statut']); ?> </td>
            <?php
            if ($employe['contrat'] == '') {
                ?>
            <td>Le contrat est en cours de validation</td>
            <?php
            }else{
              ?>
                <td><?= htmlspecialchars($employe['contrat']); ?> validé </td>
            <?php
            }
            ?>


            <td>
                <a href="../bulletin/bulletin_pdf.php?id=<?= $employe['id']; ?>" class="btn btn-warning">pdf bulletin</a>
                <a href="../bulletin/ajouter_bulletin.php?id=<?= $employe['id']; ?>" class="btn btn-secondary my-3">Ajouter bulletin</a>
                <a href="../bulletin/ajouter_historique.php?id=<?= $employe['id']; ?>" class="btn btn-success">Promotion</a>

            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a onclick="history.back();"  class="mb-5"><i class="fas fa-angle-left arrow fa-3dicon fa-5x"></i></a>
<?php
require_once ('../../public/composants/footer.php');
?>


