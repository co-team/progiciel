<?php
session_start();
global $pdo;
require '../../config/db.php';
require_once ('../../public/composants/body_header.php');
//if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//    $id = $_POST['id'];
////    $employe_id = $_POST['employe_id'];
////    $date_paie = $_POST['date_paie'];
////    $cotisations = $_POST['cotisations'];
////    $salaire_brut = $_POST['salaire_brut'];
//
//    $stmt = $pdo->prepare("SELECT * FROM bulletins_paie WHERE WHERE id = ?");
//    $stmt->execute();
//    header("Location: bulletins.php");
//}

if (isset($_GET['id'])) {
    $id = $_SESSION['user_id'];
    $stmt = $pdo->prepare("SELECT *,em.nom,em.prenom,em.poste,departements.nom as departement_nom,em.salaire_brut,cotisations FROM bulletins_paie INNER JOIN employes em ON em.id = bulletins_paie.employe_id INNER JOIN departements ON departements.id = em.departement_id WHERE employe_id = ?");
    $stmt->execute([$id]);
    $bulletin = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Modifier un Bulletin de Salaire</title>
</head>
<body>
<h3 class="my-3 text-center"><b>Le Bulletin de Salaire de  <?= htmlspecialchars($bulletin['nom']); ?></b></h3>
<form action="#" method="POST">
    <ol class="list-group list-group-numbered">
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Nom</div>
                <?= htmlspecialchars($bulletin['nom']); ?>
            </div>
            
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Prénom</div>
                <?= htmlspecialchars($bulletin['prenom']); ?>
            </div>
            
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Email</div>
                <?= htmlspecialchars($bulletin['email']); ?>
            </div>
            
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Poste</div>
                <?= htmlspecialchars($bulletin['poste']); ?>
            </div>
            
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Contrat</div>
                <?= htmlspecialchars($bulletin['contrat']); ?>
            </div>
            
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Departement</div>
                <?= htmlspecialchars($bulletin['departement_nom']); ?>
            </div>
            
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Salaire brut</div>
                <?= htmlspecialchars($bulletin['salaire_brut']); ?>
            </div>
            
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Cotisations</div>
                <?= htmlspecialchars($bulletin['cotisations']); ?>
            </div>
            
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-start">
            <div class="ms-2 me-auto">
                <div class="fw-bold">Salaire net</div>
                <?= htmlspecialchars($bulletin['salaire_net']); ?>
            </div>
            
        </li>
    </ol>

    <a href="bulletin_pdf.php?id=<?= $id ?>" class="btn btn-outline-secondary my-3">voir bulletins de paie</a>
</form>
<a  onclick="history.back();" class="mb-5"><i class="fas fa-angle-left arrow"></i></a>

</body>
</html>
