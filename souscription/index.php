<?php
?>
<head>
    <title>souscription</title>
    <link rel="icon" type="image/x-icon" href="../public/images/icon.jpg">
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
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ">
<link rel="stylesheet" href="style.css">
<div class="container">

    <div class="top">
        <a onclick="return confirm('Etes vous sûr de vouloir quitter la page?')" href="../home.php" class="mb-5" style="pointer-events: painted"><h1> ⬅️</h1></a>


        <div class="toggle-btn">
            <span style="margin: 0.8em;">Annuel</span>
            <label class="switch">
                <input type="checkbox" id="checbox" onclick="check()" ; />
                <span class="slider round"></span>
            </label>
            <span style="margin: 0.8em;">Mensuel</span></div>
    </div>

    <div class="package-container">
        <div class="packages" style="background-color: orangered">
            <h1>E-commerce</h1>
            <h2 class="text1">10 000 fcfa</h2>
            <h2 class="text2">100 000 fcfa</h2>
            <ul class="list">
                <li class="first">2000 Ssouscriptions</li>
                <li>12,000 Emails/mois</li>
                <li>Multi-Utilisateurs</li>
                <li>Support Chat </li>
            </ul>
            <a href="souscription.php" class="button button1">Adherer</a>
        </div>
        <div class="packages" style="background-color: #05a0dc">
            <h1>Gestion-Hopital</h1>
            <h2 class="text1">20 000 fcfa</h2>
            <h2 class="text2">200 000 fcfa</h2>
            <ul class="list">
                <li class="first">Basic +</li>
                <li>Compte administrateur</li>
                <li>Formation</li>
                <li> Support Premium</li>
            </ul>
            <a href="souscription.php" class="button button2">Adherer</a>
        </div>
        <div class="packages" style="background-color: green">
            <h1>Gestion Administrative</h1>
            <h2 class="text1" style="margin-top: 2px">25 000 fcfa</h2>
            <h2 class="text2">250 000 fcfa</h2>
            <ul class="list">
                <li class="first">Professional +</li>
                <li>Compte Administrateur</li>
                <li>Gestion Paiement</li>
                <li>Bulletins, Congé</li>
            </ul>
            <a href="souscription.php" class="button button3">Adherer</a>
        </div>
    </div>
</div>

<script src="./script.js"></script>
</body>
