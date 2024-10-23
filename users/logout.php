<?php
session_start();
session_destroy();

// Redirection vers la page de connexion
header('Location: login.php');
exit();
?>
