
<form method="POST" action="ajouter_contrat.php">
    Sélectionner l'employé:
    <select name="employe_id" required>
        <?php
        global $pdo;
        // Récupérer la liste des employés depuis la base de données
        require('../../config/db.php');
        $sql = "SELECT id, username FROM utilisateurs WHERE role = 'Employe'";
        $stmt = $pdo->query($sql);
        while ($row = $stmt->fetch()) {
            echo "<option value='" . $row['id'] . "'>" . $row['username'] . "</option>";
        }
        ?>
    </select><br>

    Type de contrat:
    <select name="type_contrat" required>
        <option value="CDI">CDI</option>
        <option value="CDD">CDD</option>
        <option value="Stage">Stage</option>
    </select><br>

<!--    Date de début: <input type="date" name="date_debut" required><br>-->
    Date de fin: <input type="date" name="date_fin"><br> <!-- Peut être vide pour un CDI -->

    <!--Salaire (en EUR): <input type="number" name="salaire" step="0.01" required><br>-->

    Statut:
    <select name="statut" required>
        <option value="Actif">Actif</option>
        <option value="Résilié">Résilié</option>
    </select><br>

    <button type="submit">Ajouter Contrat</button>
</form>
