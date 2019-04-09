<?php
include ('../function/connexion_root_sql.php');
session_start();
$result = mysqli_query($db, "DELETE FROM `products` WHERE id='".$_POST['id']."'");
header('Location: admin.php'); 
mysqli_free_result($result);
?>
