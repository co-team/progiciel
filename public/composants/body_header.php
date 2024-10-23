<?php
//session_start();
// db.php
require_once ('db.php');
//if ($_SESSION['user_id'] AND $_SESSION['role'] == 'RH'){
//global $pdo;
//$result = "SELECT *,departements.id as departe,departements.nom as depart FROM utilisateurs INNER JOIN departements ON departements.id=utilisateurs.departement WHERE utilisateurs.departement= '".$_SESSION['departement']."'";
//$requete = $pdo->query($result);
//$resultats = $requete->fetchAll();
//foreach ($resultats as $resultat) {
//    $depart= $resultat['depart'];
//}
//
//}else{
//?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
          crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Progiciel</title>
    <link rel="icon" type="image/x-icon" href="../images/icon.jpg">
</head>
<body>
<style>
    .arrow {
        color: #006064;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: white;
        text-align: center;
        line-height: 50px;
        font-size: 40px;
        text-shadow: text-shadow: 0 0 0 #006064;20px 0 0 #006064, 20px 0 0 #006064, 40px 0 0 #006064;
        transition: 0.6s linear;
        transform: translate(50%, 50%);
        cursor: pointer;
    }
    .arrow:hover {
        text-shadow: 20px 0 0 #006064, 20px 0 0 #006064, 40px 0 0 #006064;
    }

</style>
<nav class="navbar navbar-expand-lg navbar-light bg-dark p-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
<!--            <b style="color: #00bb00">Entrprise : --><?php
//                if (isset($_SESSION['departement'])) {
//                    echo $_SESSION['departement'];
//                $depart ;
//
//                }else{
//                    echo 'vide';
//                }
//                ?>
<!--            </b>-->
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style=" color: white!important;"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
<!--                --><?php
//                if ($_SESSION['role'] == 'RH'){
//                ?>
                <li class="nav-item">
                    <a  class="nav-link active" aria-current="page" href="../../views/utilisateurs/RH/dashboard.php?id=<?= $depart ?>" style=" color: white!important;">Accueil</a>
                </li>
<!--                --><?php
//                }
//                if ($_SESSION['role'] == 'RH') {
//                    ?>
                    <li class="nav-item">
                        <a  class="nav-link active" aria-current="page" href="../../views/utilisateurs/RH/dashboard.php?id=<?= $depart ?>" style=" color: white!important;">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" style=" color: white!important;">Connexion</a>
                    </li>
<!---->
<!--                    --><?php
//                }else{
//                ?>
                    <li class="nav-item">
                        <a  class="nav-link active" aria-current="page" href="" style=" color: white!important;">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../views/logout.php" style=" color: white!important;">Déconnexion</a>
                    </li>
<!--                --><?php
//                }}
//                ?>
            </ul>

        </div>
    </div>
</nav>
<div class="container my-5">
