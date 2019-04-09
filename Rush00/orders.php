<?php
include('function/connexion_root_sql.php');
session_start();
$order = serialize($_SESSION['cart']);
$result = mysqli_query($db, "INSERT INTO orders (listing) VALUES ('".$order."')");
header('Location: index.php'); 
mysqli_free_result($result);
?>
