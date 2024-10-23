<?php
// Connexion à la base de données

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "salarie_gestion";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}