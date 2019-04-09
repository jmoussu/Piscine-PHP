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
</head>
<body>
	<div id="title" style="text-align:center">Gaming Select</div>
	<div class="centre">
		<div id="category">
			<h3 align="center">Category</h3>
			<hr>
			<form method="post" action="">
				<select name="category" size="1">
				<?php
					if (!empty($_POST['category']))
						echo ("<option name='category' value=''>".$_POST['category']."</option>");
					echo ("<option name='category' value=''>Everythings</option>");
					$result = mysqli_query($db, "SELECT DISTINCT `category` FROM `products`");
					while($products = mysqli_fetch_assoc($result))
					{
						if ($products['category'] != $_POST['category'])
							echo("<option name='category' value='".$products['category']."'>".$products['category']."</option>");
					}
					mysqli_free_result($result);
				?>
				<input type="submit" value="Go" title="Change category"/>
				</select>
			</form>
		</div>
		<div id="vitrine">
		<?php
			if (!empty($_POST['category']))
			{
				$category = $_POST['category'];
				$result = mysqli_query($db, "SELECT * FROM `products` WHERE category='".$category."'");
			}
			else
				$result = mysqli_query($db, "SELECT * FROM `products`");
			if ($result !== FALSE)
			{
				while($products = mysqli_fetch_assoc($result))
				{
					echo("<div class='product'>");
					echo("<img src='".$products['img']."' alt='bonjour'>");
					#echo("<div class='product' style='background-image: url('".$products["img"]."')>");
					echo("<div class='title'>".$products["name"]."</div>");
					echo("<div class='price'>".$products["price"]."€ </div>");
					echo('
					<form id="tocart.php" name="tocat.php" action="tocart.php" method="post" accept-charset="UTF-8">
					<input type="number" id="qte" value="1" name="qte" min="1" max="9">
					<button type="submit" name="submit" value="   '.$products["id"].'   ">Buy</button>
					</form>
					');
					echo("</div>");
				}
				mysqli_free_result($result);
			}
		?>
		</div>
		<div class="panel">
			<br>
			<?php
				if (!(isset($_SESSION['loggued_on_user'])))
				{
					echo('<a href="index_create.php"><button type="button">Create an account</button></a>');
					echo('<a href="index_login.php"><button type="button">Login</button></a>');
					echo('<a href="logout.php"><button type="button">Restart</button></a>');
				}
				else
				{
					echo('<div><p>Welcome to Gaming select :</p><p>'.$_SESSION['loggued_on_user'].' !</p></div>');
					echo('<a href="logout.php"><button type="button" >logout</button></a>');
					echo('<a href="manage/index.php"><button type="button" >Manage your account !</button></a>');
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
			<hr>
			<div>
				<p style="text-align: center;">Your cart :</p> 
				<?php if (isset($_SESSION['cart']))
						{
							$i = 1;
							foreach( $_SESSION['cart'] as $value )
							{
								if (isset($value['name']) && isset($value['qte']))
								{
									if ($i == 1)
										echo "<p>1 : ".$value['name']. " x" .$value['qte']. "</p>";
									if ($i == 2)
										echo "<p>2 : ".$value['name']. " x" .$value['qte']. "</p>";
									if ($i == 3)
										echo "<p>3 : ".$value['name']. " x" .$value['qte']. "</p>";
									if ($i == 4)
										echo "<p>And More ...</p>";
								}
								$i++;
							}
						}
				?>
				<a href="cart.php"><button type="button">Your Cart !</button></a>
			</div>
		</div>
	</div>
	<!--<form id='create.php' name="create.php" action='create.php' method='post' accept-charset='UTF-8'>
		Identifiant: <input name="login" value="" />
		<br />
		Mot De passe: <input name="passwd" value="" />
		<input type="submit" name="submit" value="OK"/>
	</form>-->
</body>
</html>
