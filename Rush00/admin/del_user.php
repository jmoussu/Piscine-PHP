<?php
include ('../function/connexion_root_sql.php');
$result = mysqli_query($db, "DELETE FROM `users` WHERE id='".$_POST['id']."'");
header('Location: admin.php'); 
mysqli_free_result($result);
?>
