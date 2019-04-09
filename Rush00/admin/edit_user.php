<?php
include ('../function/connexion_root_sql.php');
$result = mysqli_query($db, "UPDATE `users` SET email='".$_POST['email']."', passwd='".$_POST['password']."', admin_val='".$_POST['rank']."' WHERE id=".$_POST['id']);
header('Location: admin.php'); 
mysqli_free_result($result);
?>
