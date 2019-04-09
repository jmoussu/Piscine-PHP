<?php
include ('../function/connexion_root_sql.php');
session_start();
if (!isset($_SESSION['loggued_on_user']))
	 header('Location: ../index.php');
echo("current user : ".$_SESSION['loggued_on_user']);
$result = mysqli_query($db, "SELECT * FROM `users` WHERE email='".$_SESSION['loggued_on_user']."'");
while($admin = mysqli_fetch_assoc($result))
{
	if ($admin['admin_val'] != 1)
		 header('Location: ../index.php'); 
}
mysqli_free_result($result);
?>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin panel</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css">
	<style>
	thead {color:green;}
	tbody {color:blue;}

	table, th, td {
  	border: 1px solid black;
	}
</style>
</head>
<body>
	<div id="members">
	<h1>Members</h1>
	<table>
		<thead>
		<tr>
			<th>id</th>
			<th>email</th>
			<th>password</th>
			<th>rank</th>
			<th>del</th>
		<tr>
		<thead>
		<tbody>
		<?php
			$result = mysqli_query($db, "SELECT * FROM `users`");
			while($users = mysqli_fetch_assoc($result))
			{
				echo("<tr>");
				echo("<th>".$users['id']."</th>");
				echo("<th>".$users['email']."</th>");
				echo("<th>".$users['passwd']."</th>");
				echo("<th>".$users['admin_val']."</th>");
				echo("<th><form method='post' action='del_user.php'><button type='submit' name='id' value='".$users['id']."'>X</button></form></th>");
				echo("</tr>");
			}
			mysqli_free_result($result);
		?>
		</tbody>
	</table>
	<h2>Edit user</h2>
	<div>
		<table>
			<thead>
				<tr>
					<th>id</th>
					<th>email</th>
					<th>password</th>
					<th>rank</th>
				<tr>
			<thead>
			<tbody>
			<tr>
				<form method="post" action="edit_user.php">
				<th><input type="number" name="id"></th>
				<th><input type="email" name="email"></th>
				<th><input type="text" name="password"></th>
				<th><input type="number" name="rank"></th>
				<th><input type="submit" value="Edit"></th>
				</form>
			</tr>
			</tbody>
		</table>
	</div>
	<h2>Create new user</h2>
	<div>
		<table>
			<thead>
				<tr>
					<th>id</th>
					<th>email</th>
					<th>password</th>
					<th>rank</th>
				<tr>
			<thead>
			<tbody>
			<tr>
				<form method="post" action="create_user.php">
				<th><input type="number" name="id" disabled></th>
				<th><input type="email" name="email" required></th>
				<th><input type="text" name="password" required></th>
				<th><input type="number" name="rank" required></th>
				<th><input type="submit" value="Create"></th>
				</form>
			</tr>
			</tbody>
		</table>
	</div>
	</div>
	<hr>
	<h1>Products</h1>
	<div id="products">
	<table>
		<thead>
		<tr>
			<th>id</th>
			<th>name</th>
			<th>price</th>
			<th>category</th>
			<th>img path</th>
			<th>del</th>
		<tr>
		<thead>
		<tbody>
		<?php
			$result = mysqli_query($db, "SELECT * FROM `products`");
			while($products = mysqli_fetch_assoc($result))
			{
				echo("<tr>");
				echo("<th>".$products['id']."</th>");
				echo("<th>".$products['name']."</th>");
				echo("<th>".$products['price']."€ </th>");
				echo("<th>".$products['category']."</th>");
				echo("<th>".$products['img']."</th>");
				echo("<th><form method='post' action='del_product.php'><button type='submit' name='id' value='".$products['id']."'>X</button></form></th>");
				echo("</tr>");
			}
			mysqli_free_result($result);
		?>
		</tbody>
	</table>
	<h2>Edit product</h2>
	<div>
		<table>
			<thead>
				<tr>
					<th>id</th>
					<th>name</th>
					<th>price</th>
					<th>category</th>
					<th>img path</th>
				<tr>
			<thead>
			<tbody>
			<tr>
				<form method="post" action="edit_product.php">
				<th><input type="number" name="id"></th>
				<th><input type="text" name="name"></th>
				<th><input type="float" name="price"></th>
				<th><input type="text" name="category"></th>
				<th><input type="text" name="img"></th>
				<th><input type="submit" value="Edit"></th>
				</form>
			</tr>
			</tbody>
		</table>
	</div>
	<h2>Create products</h2>
	<div>
		<table>
			<thead>
				<tr>
					<th>id</th>
					<th>name</th>
					<th>price</th>
					<th>category</th>
					<th>img path</th>
				<tr>
			<thead>
			<tbody>
			<tr>
				<form method="post" action="create_product.php">
				<th><input type="number" name="id" disabled></th>
				<th><input type="text" name="name" required></th>
				<th><input type="float" name="price" required></th>
				<th><input type="text" name="category" required></th>
				<th><input type="text" name="img" required></th>
				<th><input type="submit" value="Create"></th>
				</form>
			</tr>
			</tbody>
		</table>
	</div>
	<div>
	<hr>
	<h1>Commandes en cour</h1>
	<table>
		<thead>
		<tr>
			<th>id</th>
			<th>id buyer</th>
			<th>adress</th>
			<th>credit card</th>
			<th>content</th>
		<tr>
		<thead>
		<tbody>
		<?php
			$result = mysqli_query($db, "SELECT * FROM `orders`");
			while($orders = mysqli_fetch_assoc($result))
			{
				echo("<tr>");
				echo("<th>".$orders['id']."</th>");
				echo("<th>".$orders['id_buyer']."</th>");
				echo("<th>".$orders['adress']."</th>");
				echo("<th>".$orders['cc']."</th>");
				$array = unserialize($orders['listing']);
				echo("<th>");
				foreach($array as $tmp)
				{
					echo("<div>- ".$tmp['name']." - x".$tmp['qte']."</div>");
				}
				echo("</th>");
				unset($tmp);
				echo("</tr>");
			}
			mysqli_free_result($result);
		?>
		</tbody>
	</table>

	</div>
</body>
</html>
