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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Pixelify+Sans&amp;family=Poppins">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link rel="stylesheet" href="coteam.css">
    <title>Progiciel</title>
    <link rel="icon" type="image/x-icon" href="./public/images/icon.jpg">
</head>
<body style="background-color: white!important;">



<!-- Header -->
<div class="navik-header header-opacity header-shadow" style="background-color: #333333">
    <div class="container">

        <!-- Navik header -->
        <div class="navik-header-container">

            <!--Logo-->
            <div class="logo" data-mobile-logo="./public/images/just.jpg" data-sticky-logo="./public/images/just.jpg" style="width: 100px">
                <a href="home.php"><img src="./public/images/erp.gif" alt="logo"/></a>
            </div>

            <!-- Burger menu -->
            <div class="burger-menu">
                <div class="line-menu line-half first-line"></div>
                <div class="line-menu"></div>
                <div class="line-menu line-half last-line"></div>
            </div>

            <!--Navigation menu-->
            <nav class="navik-menu separate-line submenu-top-border submenu-scale" >
                <ul class="list-unstyled">
                    <li class="current-menu"><a href="#">Connexions</a>
                        <ul class="list-unstyled" >
                            <li><a href="./views/utilisateurs/login.php" style="color: green!important;">Connexion Employé</a></li>
                            <li><a href="./users/login.php" style="color:#7d1038!important;">Connexion Souscripteur</a></li>
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
                    <li><a href="coteam.php">A propos</a></li>
                    <li><a href="service.php">Services</a></li>
                    <li><a href="IA.php">Assistance</a></li>
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

<div class="book">
    <div class="page">
        <div class="front cover">
            <h1>CoteamDev</h1>
            <p>2024.<br>A propos</p>
        </div>
        <div class="back">

            <h2>coteamdev</h2>
            <p>yves.soumou@coteamdev.tech <code>grow</code> together.</p>
        </div>
    </div>

    <div class="page">
        <div class="front">
            <p>Coteamdev est une équipe qui accompagne des projets dans la création d'applications web et mobiles.
                Vous pourriez explorer différents aspects avec un partenaire comme Coteamdev Conseil et conception :
                « Ils peuvent aider à définir les fonctionnalités de l'application, choisir les meilleures technologies et créer des prototypes.</p>
        </div>
        <div class="back">
            <img src="./public/images/ia.avif" alt="Img 1">
        </div>
    </div>

    <div class="page">
        <div class="front">
            <h2>coteamdev</h2>
            <p>Développement : Ils peuvent s'occuper du développement complet des applications web et mobiles, avec une expertise en langages comme PHP,
                JavaScript, et des frameworks comme Symfony, React, ou des technologies mobiles comme Flutter et React Native. Gestion de projet :
                Une équipe de développement peut offrir un suivi de projet, des tests et assurer une livraison dans les délais, tout en respectant les objectifs fixés.</p>
        </div>
        <div class="back">
            <p> Maintenance et évolution : Ils peuvent aussi assurer la maintenance continue des applications,
                corriger les bugs et ajouter de nouvelles fonctionnalités au fil du temps.</p>
        </div>
    </div>

    <div class="page">
        <div class="front">
            <h2>Coteamdev</h2>
            <p>Si vous souhaitez explorer ce type de service ou obtenir un accompagnement pour la création d'une application,
                travailler avec une équipe spécialisée dans le développement comme Coteamdev pourrait vous aider à concrétiser
                vos projets plus rapidement et efficacement.|</p>
        </div>
        <div class="back">
            <p>Accompagnement personnalisé : Conseils et assistance tout au long du processus de création, de l'idée initiale jusqu'au produit final.</p>
        </div>
    </div>

    <div class="page">
        <div class="front">
            <p>Développement full-stack : Prise en charge à la fois du front-end (interface utilisateur) et du back-end (base de données, API).</p>
        </div>
        <div class="back">
            <p>Gestion de projet : Suivi des étapes clés, gestion des versions, et organisation des livrables.
                Maintenance et support : Suivi après la mise en production pour les mises à jour et corrections de bugs.</p>
        </div>
    </div>

    <div class="page">
        <div class="front">
            <img src="./public/images/africa.webp" alt="Img 2">
        </div>
        <div class="back cover">
            <h3>C'est tout, les amis</h3>
            <p>Coteamdev:<br><a href="https://www.coteamdev.tech/" target="_blank" rel="nofollow">Scarface</a>
                <br>Idée originale :<br><a href="http://carrentale.coteamdev.tech/" target="_blank" rel="nofollow">Merci !</a>
                </p>
        </div>
    </div>
</div>

<script src="coteam.js"></script>
</body>
</html>