<?php
session_start();
include ('function/connexion_root_sql.php');

if ($_SESSION && isset($_SESSION['cart']))
	$cart = $_SESSION['cart'];
else
{
	$cart = [];
// if ($_POST[''])
}

if ($_POST && $_POST['submit'])
{
	$cart[$_POST['submit']]['id'] = $_POST['submit'];
}
else
{
	header('Location: index.php');
	exit();
}


$resultat = mysqli_query($db, "SELECT name, price FROM `products` WHERE id='".$cart[$_POST['submit']]['id']."'");
while($donnees = mysqli_fetch_assoc($resultat))
{
	if ($donnees['name'] && $donnees['price'])
	{
		$cart[$_POST['submit']]['name']= $donnees['name'];
		$cart[$_POST['submit']]['price']= $donnees['price'];
		break;	}
}
mysqli_free_result($resultat);

if ( !(isset($cart[$_POST['submit']]['qte'])) )
	$cart[$_POST['submit']]['qte'] = $_POST['qte'];
else
	$cart[$_POST['submit']]['qte'] = $cart[$_POST['submit']]['qte'] + $_POST['qte'];


print_r($cart);
echo"<br>";

$_SESSION['cart'] = $cart;
print_r($_SESSION['cart']);

echo '<a href="index.php"><button type="Index" >Index</button></a>';
header('Location: index.php');


// Cart
?>
