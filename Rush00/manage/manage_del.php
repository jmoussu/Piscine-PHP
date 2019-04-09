<?php
include ('../function/connexion_root_sql.php');
session_start();
$result = mysqli_query($db, "DELETE FROM `users` WHERE id='".$_POST['id']."'");
mysqli_free_result($result);
header('Location: ../logout.php'); 
?>
