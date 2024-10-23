<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Service</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"><!-- Font Awesome CSS -->
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="service.css">
    <!-- Navik navigation CSS -->
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> <!-- Google fonts -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>Progiciel</title>
    <link rel="icon" type="image/x-icon" href="./public/images/icon.jpg">
</head>

<body style='font-family: "Poppins", sans-serif;'>
<div class="navik-header header-opacity header-shadow" style="background-color:#534f4f ">
    <div>

        <!-- Navik header -->
        <div class="navik-header-container">

            <!--Logo-->
            <div class="logo" data-mobile-logo="./public/images/just.jpg" data-sticky-logo="./public/images/just.jpg" style="width: 100px;margin-left: 5px">
                <a href="home.php"><img src="./public/images/erp.gif" alt="logo"/></a>
            </div>

            <!-- Burger menu -->
            <div class="burger-menu">
                <div class="line-menu line-half first-line"></div>
                <div class="line-menu"></div>
                <div class="line-menu line-half last-line"></div>
            </div>

            <!--Navigation menu-->
            <nav class="navik-menu separate-line submenu-top-border submenu-scale" style="float: left;!important;">
                <ul class="list-unstyled" style="margin-left: 100px">
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
<!--<a style="justify-content: center;align-items: center;display: flex;font-size: 30px;font-weight: bold;text-decoration: none"  onclick="history.back();"><i class="fas fa-arrow-left fa-3dicon fa-2x"></i></a>-->
<section class="container" style="margin-top: 0">
    <section class="card__container">
        <div class="card__bx" style="--clr: #89ec5b">
            <div class="card__data">
                <div class="card__icon">
                    <i class="fa-solid fa-paintbrush"></i>
                </div>
                <div class="card__content">
                    <h3>Design</h3>
                    <p style="font-size: 10px">UI/UX Design, Identité visuelle : La conception de l'interface utilisateur (UI) et de l'expérience utilisateur (UX) est cruciale pour rendre l'application intuitive et agréable à utiliser. Un design sur mesure vous permet de vous différencier avec une interface unique et parfaitement adaptée à votre audience.</p>
<!--                    <a href="#">Read More</a>-->
                </div>
            </div>
        </div>
        <div class="card__bx" style="--clr: #d87d1d">
            <div class="card__data">
                <div class="card__icon">
                    <i class="fa-solid fa-code"></i>
                </div>
                <div class="card__content">
                    <h3>Developpement</h3>
                    <p style="font-size: 10px">Développement sur mesure : Vous pouvez bénéficier d'un accompagnement personnalisé pour concevoir des applications web ou mobiles, avec des recommandations sur les technologies à adopter en fonction de vos besoins.
                        Stratégie produit : Conseils sur l'architecture, les fonctionnalités et les parcours utilisateurs.</p>
<!--                    <a href="#">Read More</a>-->
                </div>
            </div>
        </div>
        <div class="card__bx" style="--clr: #5b98eb">
            <div class="card__data">
                <div class="card__icon">
                    <i class="fa-brands fa-searchengin"></i>
                </div>
                <div class="card__content">
                    <h3>SEO</h3>
                    <p style="font-size: 10px">Audit SEO : Analyse complète de votre site web ou application pour identifier les opportunités d'amélioration en termes de référencement naturel.
                        Optimisation de contenu : Formation et assistance pour créer du contenu optimisé pour les moteurs de recherche.</p>
<!--                    <a href="#">Read More</a>-->
                </div>
            </div>
        </div>

        <div class="card__bx" style="--clr: rgba(112,138,223,0.9)">
            <div class="card__data">
                <div class="card__icon">
                    <i class="fa fa-users"></i>
                </div>
                <div class="card__content">
                    <h3>Assistance technique</h3>
                    <p style="font-size: 10px">Support technique : Résolution de problèmes techniques liés aux serveurs, aux bases de données, ou aux infrastructures cloud.
                        Maintenance et mise à jour : Services de maintenance continue pour assurer la mise à jour et la sécurité de vos applications et sites web.</p>
<!--                    <a href="#">Read More</a>-->
                </div>
            </div>
        </div>

        <div class="card__bx" style="--clr: rgb(9,191,143)">
            <div class="card__data">
                <div class="card__icon">
                    <i class="fa fa-desktop"></i>
                </div>
                <div class="card__content">
                    <h3>Formation au logiciel</h3>
                    <p style="font-size: 10px">Utilisation de logiciels : Assistance pour la prise en main de logiciels spécifiques</p>
<!--                    <a href="#">Read More</a>-->
                </div>
            </div>
        </div>

        <div class="card__bx" style="--clr: #edca1a">
            <div class="card__data">
                <div class="card__icon">
                    <i class="fa fa-server"></i>
                </div>
                <div class="card__content">
                    <h3>Application sur mesure</h3>
                    <p style="font-size: 10px">Sécurité et performance : Optimisation de la sécurité (cryptage des données, protection contre les attaques).
                        Évolutivité : Le développement sur mesure permet de prévoir une architecture évolutive pour ajouter des fonctionnalités futures ou pour s'adapter à une augmentation du nombre d'utilisateurs sans nécessiter une refonte complète.</p>
<!--                    <a href="#">Read More</a>-->
                </div>
            </div>
        </div>

    </section>

</section>

</body>
</html>