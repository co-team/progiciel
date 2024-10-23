<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Sélectionner un utilisateur pour abonnement</title>
</head>
<body>
<h2>Sélectionner un utilisateur pour l'abonnement</h2>
<form action="../../users/inscription_souscription.php" method="POST">
    <label for="user_id">ID de l'utilisateur :</label>
    <select id="user_id" name="user_id" required>
        <?php
        require_once ('../../config/db.php');
        global $pdo;
        $sql = "SELECT * FROM users order by id desc";
        $result=$pdo->query($sql);
        $resultats = $result->fetchAll();
        foreach ($resultats as $user) {
            echo "<option value='" . $user['id'] . "'>" . $user['id'] . " " . $user['nom'] . " " . $user['prenom'] . "</option>";
        }
        ?>
    </select>
    <label for="categorie">Catégorie d'abonnement :</label>



    <select class="form-control mb-5" name="categorie">
        <option value="E-commerce">E-commerce</option>
        <option value="Gestion-hopital">Gestion-hopital</option>
        <option value="Gestion-administrative">Gestion-administrative</option>
    </select>

    <!--    <input type="number" id="user_id" name="user_id" required><br><br>-->

    <label for="type_abonnement">Type d'abonnement :</label>
    <select id="type_abonnement" name="type_abonnement" required>
        <option value="Mensuel">Mensuel</option>
        <option value="Annuel">Annuel</option>
    </select><br><br>
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

    <button type="submit">Créer l'abonnement et la clé</button>
</form>
</body>
</html>
