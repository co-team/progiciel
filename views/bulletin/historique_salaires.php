<?php
require '../../config/db.php';

// Ajouter un enregistrement d'historique de salaire
function ajouterHistoriqueSalaire($employe_id, $salaire, $date_changement) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO historique_salaires (employe_id, salaire, date_changement) VALUES (?, ?, ?)");
    $stmt->execute([$employe_id, $salaire, $date_changement]);
}

// Lire l'historique des salaires d'un employé
function getHistoriqueSalaires($employe_id) {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM historique_salaires WHERE employe_id = ?");
    $stmt->execute([$employe_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

