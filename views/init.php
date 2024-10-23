<?php
session_start();

  //session_start();
  if (!isset($_SESSION['user_id']))
     header('location:./utilisateurs/home.php');
?>
