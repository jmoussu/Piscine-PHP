<?php
include ('function/connexion_root_sql.php');
?>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Made Account</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/page.css">
	<link rel="stylesheet" type="text/css" href="css/extern.css">
</head>
<body>
	<div id="center">
	<form id='create.php' name="create.php" action='create.php' method='post' accept-charset='UTF-8'>
		<input class="text" placeholder="Email" type="email" name="login" value="" />
		<br />
		<input class="text" placeholder="Password" type="password" name="passwd" value="" />
		<input type="submit" name="submit" value="OK"/>
	</form>
	<a href="index_login.php"><button type="button" >Login</button></a>
	</div>
</body>
</html>
