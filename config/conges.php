<?php
require 'db.php';
function getConge(): bool|array
{
    global $pdo;
    $stmt = $pdo->query("SELECT employe_id,type_conge,date_debut,date_fin,conges.statut as statut,nom,prenom,poste,email FROM conges INNER JOIN employes ON employes.id = conges.employe_id");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}