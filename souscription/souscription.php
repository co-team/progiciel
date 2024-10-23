<?php
session_start();
require_once ('../public/composants/body_header.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../public/css/inscription.css">
    <title>Souscription</title>
    <link rel="icon" type="image/x-icon" href="../public/images/icon.jpg">
</head>
<body>

<form action="../users/register.php" method="post" style="margin-top: 50px">
    <label for="nom">Nom :</label>
    <input class="form-control" type="text" name="nom" required>

    <label for="prenom">Prénom :</label>
    <input class="form-control" type="text" name="prenom" required>

    <label for="telephone">Téléphone :</label>
    <input class="form-control" type="text" name="telephone" required>

    <label for="email">Email :</label>
    <input class="form-control" type="email" name="email" required>

    <label for="password">Mot de passe :</label>
    <input class="form-control" type="password" name="mot_de_passe" required>

    <label for="date_naissance">Date de naissance :</label>
    <input class="form-control" type="date" name="date_naissance" required>

    <label for="sexe">Sexe :</label>
    <select class="form-control mb-5" name="sexe">
        <option value="M">Masculin</option>
        <option value="F">Féminin</option>
    </select>
    <label for="categorie">Catégorie d'abonnement :</label>



        <select class="form-control mb-5" name="categorie">
            <option value="E-commerce">E-commerce</option>
            <option value="Gestion-hopital">Gestion-hopital</option>
            <option value="Gestion-administrative">Gestion-administrative</option>
        </select>


    <label for="type_abonnement">Type d'abonnement :</label>
    <select class="form-control" name="type_abonnement">
        <option value="Mensuel">Mensuel</option>
        <option value="Annuel">Annuel</option>
    </select>
    <br><br>
    <label for="prix">Prix :</label>
    <input class="form-control" type="number" name="prix" >
    <p id="prix"></p> <!-- Prix par défaut pour "Basique Mensuel" -->
    <br><br>
    <script>
        function updatePrice() {
            // Prix des abonnements en JavaScript
            const prixAbonnements = {
                'E-commerce': {'Mensuel': 15000, 'Annuel': 150000},
                'Gestion-hopital': {'Mensuel': 20000, 'Annuel': 200000},
                'Gestion-administrative': {'Mensuel': 25000, 'Annuel': 250000}
            };

            // Récupérer la catégorie et le type d'abonnement sélectionnés
            const categorie = document.getElementById('categorie').value;
            const typeAbonnement = document.getElementById('type_abonnement').value;

            // Calculer le prix
            const prix = prixAbonnements[categorie][typeAbonnement];

            // Afficher le prix
            document.getElementById('prix').textContent = 'Prix : ' + prix + ' €';
        }
    </script>
    <button class="btn btn-outline-success my-3" type="submit">S'inscrire</button>
</form>


</body>
</html>
