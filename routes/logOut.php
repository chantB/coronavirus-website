<?php
   include("config.php");
   session_start();

$_SESSION['id'] = null;
$_SESSION['isAdmin'] = null;
header("location: Home.php");
?>
