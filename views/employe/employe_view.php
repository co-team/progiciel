<?php
require '../../config/db.php';
require_once ('../../public/composants/header-bg.php');
// dashboard.php
session_start();

// Redirige vers la page de connexion si l'utilisateur n'est pas authentifié
if (!isset($_SESSION['user_id'])) {
    header('Location:../utilisateurs/connexion.php');
    exit;
}

// Récupération des informations de l'utilisateur connecté
$user_poste = $_SESSION['poste']; // Rôle de l'utilisateur (Admin, RH, Employe)
$user_id = $_SESSION['user_id'];


// Page d'accueil avec des options de navigation
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url("../../public/images/bfr.gif");
            background-repeat: no-repeat;
            background-size: cover;


        }
        .container {
            margin: 50px auto;
            width: 80%;
        }
        .dashboard-card {
            opacity: 0.7;
            border: 1px solid #ddd;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            background-color: #f9f9f9;
            box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
        }
        h1 {
            color: rgb(14, 14, 14);
            text-align: justify;
            font-weight: bold;
            color: #FFFFFF;
            /* background: #0e8dbc;*/
            text-shadow: 0 1px 0 #0e0e0e, 0 2px 0 #0e0e0e, 0 3px 0 #1c1b1b, 0 4px 0 #1c1b1b, 0 5px 0 #aaa, 0 6px 1px rgba(0,0,0,.1), 0 0 5px rgba(0,0,0,.1), 0 1px 3px rgba(0,0,0,.3), 0 3px 5px rgba(0,0,0,.2), 0 5px 10px rgba(0,0,0,.25), 0 10px 10px rgba(0,0,0,.2), 0 20px 20px rgba(0,0,0,.15);
        }
        h3{
            color: #0e0e0e;
            text-align: justify;
            font-weight: bold;
        }
        a {

            color: #ffffff!important;
            font-weight: bold!important;
        }
        li{
            list-style:none;

        }
    </style>
</head>
<body>

<div class="container">


    <!-- Message de bienvenue basé sur le rôle de l'utilisateur -->

    <?php if($user_poste != ''): ?>
        <h2 style="color: white;font-weight: bold">Bonjour, Employé <?= $_SESSION['nom'] ?>!</h2>
    <?php endif; ?>

    <!-- Section de navigation en fonction du rôle -->
    <div class="dashboard-card">

        <?php if ($user_poste != ''): ?>
            <h3>Vos informations</h3>
            <ul>
                <li><a class="btn btn-primary my-2" href="../bulletin/details_bulletin.php?id=<?=$_SESSION['user_id']?>">Voir votre bulletin de paie</a></li>
                <li><a class="btn btn-primary my-2" href="../conges/demande_conge.php">Faire une demande de congé</a></li>
                <li><a class="btn btn-info my-2" href="../conges/mesConges.php?id=<?=$_SESSION['user_id']?>">Mes congés</a></li>
            </ul>
        <?php endif; ?>

        <!-- Options disponibles pour tous les rôles -->
        <h3>Autres options</h3>
        <ul>
            <!--            <li><a href="../mot_de_passe_oublier.php?">Changer le mot de passe</a></li>-->
            <li><a class="btn btn-danger my-2" href="../logout.php">Déconnexion</a></li>
        </ul>
    </div>
    <a onclick="history.back();" class="mb-5"><i class="fas fa-angle-left arrow"></i></a>
</div>

</body>
</html>


