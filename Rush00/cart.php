<?php
include ('function/connexion_root_sql.php');
session_start();
?>

<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Main page</title>
	<link rel="stylesheet" type="text/css" href="css/page.css">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" type="text/css" href="css/cart.css">
</head>
<body>
	<div id="title" style="text-align:center">Your cart</div>
	<div class="centre" >
		<div id="valider">
		</div>
		<div id="vitrine">
			<table style="color: white;">
			<thead>
				<tr>
					<th>id</th>
					<th>object</th>
					<th>price</th>
					<th>quantity</th>
				</tr>
			</thead>
			<tbody>
			<?php
				$price = 0.00;
				foreach($_SESSION['cart'] as $tmp)
				{
					echo("<tr>");
					echo("<th>".$tmp['id']."</th>");
					echo("<th>".$tmp['name']."</th>");
					echo("<th>".$tmp['price']." €</th>");
					echo("<th>".$tmp['qte']."</th>");
					echo("<tr>");
					$price += $tmp['price'] * $tmp['qte'];
				}
				unset($tmp);
			?>
			</tbody>
			</table>
			<?php
				echo("<h3 style='color: white'>Final price : ".$price." €</h3>");
				if (isset($_SESSION['loggued_on_user']))
					echo('<a href="orders.php">Commander</a>');
				else
					echo('<a href="index_login.php">Se connecter pour commander</a>');
			?>
		</div>
		<div class="panel">
			<?php
				if (!(isset($_SESSION['loggued_on_user'])))
				{
					echo('<a href="index_create.php"><button type="button">Create an account</button></a>');
					echo('<a href="index_login.php"><button type="button">Login</button></a>');
					echo('<a href="logout.php"><button type="button">Restart</button></a>');
				}
				else
				{
					echo('<br><div>Hi :'.$_SESSION['loggued_on_user'].' !</div>');
					echo('<a href="logout.php"><button type="button" >logout</button></a>');
					$resultat = mysqli_query($db, 'SELECT email, admin_val FROM users');
					while($donnees = mysqli_fetch_assoc($resultat))
					{
						if ($_SESSION['loggued_on_user'] == $donnees['email'] && $donnees['admin_val'] == 1)
						{
							echo('<a href="admin/admin.php"><button type="button" >Admin panel !</button></a>');
							break;
						}
					}
					mysqli_free_result($resultat);
				}
			?>
			<a href="index.php"><button type="Index" >Index</button></a>
	</div>
</body>
</html>
