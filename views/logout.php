<?php
session_start();
session_unset();
session_destroy();
header("location:../home.php");
?>

//echo 'You have been logged out. <a href="../home.php">Go back</a>';