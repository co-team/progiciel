<?php
require 'db.php';

// Ajouter un bulletin de paie
function ajouterBulletin($employe_id, $date_paie, $salaire_brut, $cotisations, $salaire_net) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO bulletins_paie (employe_id, date_paie, salaire_brut, cotisations, salaire_net) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$employe_id, $date_paie, $salaire_brut, $cotisations, $salaire_net]);
}

// Lire les bulletins de salaire
function getBulletins() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM bulletins_paie");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
