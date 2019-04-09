<?php
include ('../function/connexion_root_sql.php');
$result = mysqli_query($db, "UPDATE `products` SET name='".$_POST['name']."', price='".$_POST['price']."', category='".$_POST['category']."', img='".$_POST['img']."'  WHERE id=".$_POST['id']);
header('Location: admin.php'); 
mysqli_free_result($result);
?>
