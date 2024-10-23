<?php
?>
<?php

require '../config/db.php';
require_once '../public/composants/body_header.php';
require_once("../public/composants/footer.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="../public/css/fa.css">
    <link rel="stylesheet" href="../public/css/vie.css">
    <title>Gestion des Salariés</title>
</head>
<body >

    <h1 class="my-5">GESTION&nbsp;DES&nbsp;&nbsp;SALARIES</h1>


<nav class="navbar navbar-expand-lg " style="justify-content: center;align-items: center;display: flex">
    <a href="employe/ajouter_employe.php" class="btn btn-primary m-3 " style="color: white">Ajouter Employé</a>
    <a href="employe/afficher_employes.php" class="btn btn-primary m-3 " style="color: white">Voir les Employés</a>
    <a href="departement/departement.php" class="btn btn-primary m-3 " style="color: white">Départements</a>
    <a href="bulletin/bulletins.php" class="btn btn-primary m-3 " style="color: white">Bulletins de Paie</a>
    <a href="bulletin/historique_salaire.php" class="btn btn-primary m-3 " style="color: white">Historique des Salaires</a>
    <a href="notifications/notifications.php" class="btn btn-primary m-3 " style="color: white">Notifications</a>
    <a href="utilisateurs/connexion.php" class="btn btn-primary m-3">Connexion</a>
</nav>

<div style="justify-content: center;align-items: center;display: flex;margin: 20px">
    <a onclick="history.back();"  class="mb-5"><i class="fas fa-angle-left arrow fa-3dicon fa-5x"></i></a>
</div>
</body>
</html>

