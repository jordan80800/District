<?php
session_start();
include 'db.php';
$db = ConnexionBase();
session_destroy();
header("Location: index.php");
exit();
?>