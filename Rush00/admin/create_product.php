<?php
include ('../function/connexion_root_sql.php');
$result = mysqli_query($db, "INSERT INTO products (name, price, category, img) VALUES ('".$_POST['name']."', '".$_POST['price']."', '".$_POST['category']."', '".$_POST['img']."')");
header('Location: admin.php'); 
mysqli_free_result($result);
?>
