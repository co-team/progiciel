<?php
session_start();

// Redirige vers la page de connexion si l'utilisateur n'est pas authentifié

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"><!-- Font Awesome CSS -->
    <link rel="stylesheet" href="index.css"> <!-- Navik navigation CSS -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> <!-- Google fonts -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Progiciel</title>
    <link rel="icon" type="image/x-icon" href="./public/images/icon.jpg">
</head>
<body>



<!-- Header -->
<div class="navik-header header-opacity header-shadow">
    <div class="container">

        <!-- Navik header -->
        <div class="navik-header-container">

            <!--Logo-->
            <div class="logo" data-mobile-logo="./public/images/just.jpg" data-sticky-logo="./public/images/just.jpg" style="width: 100px">
                <a href="#"><img src="./public/images/erp.gif" alt="logo"/></a>
            </div>

            <!-- Burger menu -->
            <div class="burger-menu">
                <div class="line-menu line-half first-line"></div>
                <div class="line-menu"></div>
                <div class="line-menu line-half last-line"></div>
            </div>

            <!--Navigation menu-->
            <nav class="navik-menu separate-line submenu-top-border submenu-scale">
                <ul class="list-unstyled">
                    <li class="current-menu"><a href="#">Connexions</a>
                        <ul class="list-unstyled" >
                            <li><a href="./views/utilisateurs/login.php" style="color: green">Connexion Employé</a></li>
                            <li><a href="./users/login.php" style="color:#7d1038">Connexion Souscripteur</a></li>
                            <!--                            <li><a href="#">Dropdown menu</a></li>-->
                            <!--                            <li><a href="#">Dropdown menu</a>-->
                            <!--                                <ul class="list-unstyled" >-->
                            <!--                                    <li><a href="#">Dropdown menu</a></li>-->
                            <!--                                    <li><a href="#">Dropdown menu</a></li>-->
                            <!--                                    <li><a href="#">Dropdown menu</a></li>-->
                            <!--                                    <li><a href="#">Dropdown menu</a></li>-->
                            <!--                                </ul>-->
                            <!--                            </li>-->
                        </ul>
                    </li>
                    <li><a href="coteam.html">A propos</a></li>
                    <li><a href="service.html">Services</a></li>
                    <li><a href="IA.html">Assistance</a></li>
                    <li><a href="./souscription/info.php">Nouvelles</a></li>
                    <li class="submenu-right"><a href="mailto:sanou196@gmail.com" target="_blank">Contact</a>
                        <!--                        <ul class="list-unstyled" >-->
                        <!--                            <li><a href="#">Dropdown menu</a></li>-->
                        <!--                            <li><a href="#">Dropdown menu</a></li>-->
                        <!--                            <li><a href="#">Dropdown menu</a></li>-->
                        <!--                            <li><a href="#">Dropdown menu</a></li>-->
                        <!--                        </ul>-->
                    </li>
                </ul>
            </nav>

        </div>

    </div>
</div>
<div class="main">


