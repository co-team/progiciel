<?php
require 'db.php';

// Fonction pour ajouter un employé
function ajouterEmploye($nom, $prenom, $date_naissance, $poste, $salaire_brut, $departement_id, $date_embauche, $email, $telephone, $adresse,$statut,$date_creation,$contrat): void
{
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO employes (nom, prenom, date_naissance, poste, salaire_brut, departement_id, date_embauche, email, telephone, adresse,statut,date_creation,contrat) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?)");
    $stmt->execute([$nom, $prenom, $date_naissance, $poste, $salaire_brut, $departement_id, $date_embauche, $email, $telephone, $adresse,$statut,$date_creation,$contrat]);
}

// Fonction pour récupérer les employés
function getEmployes() {
   // $id=$_GET['id'];
    global $pdo;
    $stmt = $pdo->query("SELECT *,departements.id,departements.nom as departement FROM employes INNER JOIN departements ON departements.id=`departement_id` ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getEmploye() {

    global $pdo;
    $stmt = $pdo->query("SELECT *,departements.id,departements.nom as departement FROM employes INNER JOIN departements ON departements.id=`departement_id` ");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
function getUtilisateur() {
    global $pdo;
    $stmt = $pdo->query("SELECT *,departements.id,departements.nom as departement FROM employes INNER JOIN departements ON departements.id=`departement_id`");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fonction pour mettre à jour un employé
function updateEmploye($id, $nom, $prenom, $poste, $salaire_brut) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE employes SET nom=?, prenom=?, poste=?, salaire_brut=? WHERE id=?");
    $stmt->execute([$nom, $prenom, $poste, $salaire_brut, $id]);
}

// Fonction pour supprimer un employé
function deleteEmploye($id) {
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM employes WHERE id=?");
    $stmt->execute([$id]);
}

// Fonction pour récupérer les employés
function getUsers() {
    global $pdo;
    $stmt = $pdo->query("SELECT *,departements.id as departe,departements.nom as depart FROM utilisateurs INNER JOIN departements ON departements.id=utilisateurs.departement");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function updateUser($id, $username, $role) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE utilisateur SET username=?, role=? WHERE id=?");
    $stmt->execute([$username, $role,$id]);
}


?>
