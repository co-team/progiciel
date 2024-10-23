<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Prolonger l'abonnement</title>
</head>
<body>
<h2>Prolonger votre abonnement</h2>
<form action="prolonger_abonnement_handler.php" method="POST">
    <label for="abonnement_type">Type d'abonnement :</label>
    <select id="abonnement_type" name="abonnement_type" required>
        <option value="Mensuel">Mensuel</option>
        <option value="Annuel">Annuel</option>
    </select><br><br>

    <button type="submit">Prolonger l'abonnement</button>
</form>
</body>
</html>

