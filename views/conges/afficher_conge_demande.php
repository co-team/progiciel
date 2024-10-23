<?php
global $pdo;
require('../../config/db.php');
require '../../config/conges.php';
require_once ('../../public/composants/sidebar.php');
$conges = getConge();

?>


<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Liste des Congés demandés</title>
<link rel="stylesheet" href="../../public/css/style.css">
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

<h1 class="text-white">Liste Congés</h1>
<a href="" class="btn btn-outline-success mb-3">congé</a>
<table >
    <thead>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Poste</th>
        <th>Email</th>
        <th>Date debut congés</th>
        <th>Date fin congés</th>
        <th>Type congé</th>
        <th>Statut congé</th>
        <th>Nombre de jours</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>

    <?php
    if ($conges <= 0 ){
        echo "Pas de demande de congé pour le moment";
    }else{
    foreach ($conges as $employe):

        $res = substr($employe["nom"], 0, 4);
        ?>

        <tr>
            <td><?=$res , htmlspecialchars($employe['employe_id']); ?>0026SILOTEC</td>
            <td><?= htmlspecialchars($employe['nom']); ?></td>
            <td><?= htmlspecialchars($employe['prenom']); ?></td>
            <td><?= htmlspecialchars($employe['poste']); ?></td>
            <td><?= htmlspecialchars($employe['email']); ?></td>
            <td><?= htmlspecialchars($employe['date_debut']); ?></td>
            <td><?= htmlspecialchars($employe['date_fin']); ?></td>
            <td><?= htmlspecialchars($employe['type_conge']); ?></td>
            <td><?= htmlspecialchars($employe['statut']); ?></td>

            <td>
                <?php
                $periode= round((strtotime($employe['date_fin']) - strtotime($employe['date_debut']))/(60*60*24));
                ?>
            <?= $periode ?> jours
            </td>

            <td>
                <?php
                if ($employe['statut'] == 'en attente') {
                    ?>
                    <a href="validation_conge.php?id=<?= $employe['employe_id']; ?>" class="btn btn-success">Valider</a>
                <?php
                }else{
                    ?>
                    <a href="refuser_conge.php?id=<?= $employe['employe_id']; ?>" class="btn btn-danger">Refuser</a>
                <?php
                }
                ?>

<!--                <a href="afficher_conge_demande.php" class="btn btn-danger mt-3">Supprimer</a>-->
            </td>
        </tr>
    <?php endforeach;} ?>
    </tbody>
</table>
<a onclick="history.back();"  class="mb-5"><i class="fas fa-angle-left arrow fa-3dicon fa-5x"></i></a>
<?php
require_once ('../../public/composants/secondfooter.php');
?>


