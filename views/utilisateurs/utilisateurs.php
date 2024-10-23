<?php

require '../../config/db.php';
require '../../config/employes.php';
require_once ('../../public/composants/sidebar.php');
$users = getUsers();
?>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Employés</title>
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

    <h1 class="text-white">Utilisateurs</h1>
    <a href="inscription.php" class="btn btn-outline-success mb-3">Ajouter un utilisateur</a>
    <table data-aos="zoom-in">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Role</th>
            <th>Département</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $employe):

            ?>

            <tr>

                <td><?= htmlspecialchars($employe['id']); ?></td>
                <td><?= htmlspecialchars($employe['username']); ?></td>
                <td><?= htmlspecialchars($employe['role']); ?></td>
                <td><?= htmlspecialchars($employe['depart']); ?></td>


                <td>
                    <a href="updateUtilisateur.php?id=<?= $employe['id']; ?>" class="btn btn-warning">Modifier</a>
                    <a onclick="return confirm('Etes vous sûr de vouloir le supprimer?')" href="supprimerUser.php?id=<?= $employe['id']; ?>" class="btn btn-secondary my-3">Supprimer</a>

                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a onclick="history.back();"  class="mb-5"><i class="fas fa-angle-left arrow fa-3dicon fa-5x"></i></a>
<?php
require_once ('../../public/composants/sidefooter.php');
?>