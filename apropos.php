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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

<body>

<style>
  body {
    font-family: '"Poppins", sans-serif';
    text-align: center;
    margin-top: 50px;
    background-color: ;
  }

  h1 {
    font-size: 30px;
  }

  .cursor {
    display: inline-block;
    background-color: black;
    width: 10px;
    height: 40px;
    vertical-align: bottom;
    animation: blink 0.7s steps(2) infinite;
  }

  @keyframes blink {
    0% { opacity: 1; }
    50% { opacity: 0; }
    100% { opacity: 1; }
  }


</style>
<div class="container">
<h1><span id="typed-text"></span><span class="cursor">|</span></h1>

</div>

<script>
  const typedText = document.getElementById('typed-text');
  const text = "  Coteamdev est une équipe qui accompagne des projets dans la création d'applications web et mobiles. Vous pourriez explorer différents aspects avec un partenaire comme Coteamdev, par exemple :\n" +
          "\n" +
          "  Conseil et conception : « Ils peuvent aider à définir les fonctionnalités de l'application, choisir les meilleures technologies et créer des prototypes.\n" +
          "  Développement : Ils peuvent s'occuper du développement complet des applications web et mobiles, avec une expertise en langages comme PHP, JavaScript, et des frameworks comme Laravel, React, ou des technologies mobiles comme Flutter et React Native.\n" +
          "  Gestion de projet : Une équipe de développement peut offrir un suivi de projet, des tests et assurer une livraison dans les délais, tout en respectant les objectifs fixés.\n" +
          "  Maintenance et évolution : Ils peuvent aussi assurer la maintenance continue des applications, corriger les bugs et ajouter de nouvelles fonctionnalités au fil du temps.\n" +
          "  Si vous souhaitez explorer ce type de service ou obtenir un accompagnement pour la création d'une application, travailler avec une équipe spécialisée dans le développement comme Coteamdev pourrait vous aider à concrétiser vos projets plus rapidement et efficacement.!";
  let index = 0;

  function typeEffect() {
    if (index < text.length) {
      typedText.innerHTML += text.charAt(index);
      index++;
      setTimeout(typeEffect, 100);  // Vitesse de saisie : 100 ms
    }
  }

  window.onload = typeEffect;

</script>
</div>
</body>
</html>
