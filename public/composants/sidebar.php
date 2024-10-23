<?php
require_once('heading.php');
?>
<title>Progiciel</title>
<link rel="icon" type="image/x-icon" href="../images/icon.jpg">
<link rel="stylesheet" href="sidebar.css">
<link rel="stylesheet" href="../../public/css/fa.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<nav class="navbar navbar-dark sticky-top flex-md-nowrap p-0">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0 font-weight-bold" href="https://www.coteamdev.tech/" style="font-family:Papyrus,fantasy;">CoteamDev</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="../../views/logout.php">Déconnectez-vous !</a>
        </li>
    </ul>
</nav>
<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="../../views/admin/">
                            <i class="zmdi zmdi-home"></i>
                            Accueil <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../views/admin/">
                            <i class="zmdi zmdi-view-dashboard"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../views/bulletin/bulletins.php">
                            <i class="zmdi zmdi-chart"></i>
                            Salaire payé
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../views/conges/afficher_conge_demande.php">
                            <i class="zmdi zmdi-accounts"></i>
                            Congés
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../views/utilisateurs/utilisateurs.php">
                            <i class="zmdi zmdi-face"></i>
                            Utilisateurs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../views/departement/departement.php">
                            <i class="zmdi zmdi-layers"></i>
                            Departement
                        </a>
                    </li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center pl-3 mt-4 mb-1 text-muted">
                    <span>Saved reports</span>
                    <a class="d-flex align-items-center text-muted" href="">
                        <i class="zmdi zmdi-plus-circle-o"></i>
                    </a>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="../../views/notifications/notifications.php">
                            <i class="zmdi zmdi-notifications-none"></i>
                            Notifications
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../views/logout.php">
                            <i class="zmdi zmdi-eject"></i>
                            Déconnexion
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../../souscription/admin.php">
                            <i class="zmdi zmdi-file-text"></i>
                            Souscription
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="zmdi zmdi-file-text"></i>
                            Year-end sale
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 my-3">