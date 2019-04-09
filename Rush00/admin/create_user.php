<?php
include ('../function/connexion_root_sql.php');
$result = mysqli_query($db, "INSERT INTO users (email, passwd, admin_val) VALUES ('".$_POST['email']."', '".$_POST['password']."', '".$_POST['rank']."')");
header('Location: admin.php'); 
mysqli_free_result($result);
?>
