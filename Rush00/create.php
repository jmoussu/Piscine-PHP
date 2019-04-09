<?php
include ('function/connexion_root_sql.php');
if ($_POST['submit'] != "OK")
{
	echo"ERROR submit is not \"OK\"\n";
	echo('<a href="index.php">Home page</a>');
	exit();
}

if (!($_POST['login']) || !($_POST['passwd']))
{
	echo"ERROR Empty informations\n";
	echo('<a href="index.php">Home page</a>');
	exit();
}

if (strlen($_POST['passwd']) < 6)
{
	echo"ERROR Your password need at leat 6 charactere\n";
	echo('<a href="index.php">Home page</a>');
	exit();
}

$tab = [
	"login" => $_POST['login'],
	"passwd" => hash('whirlpool', $_POST['passwd']) 
];

if (!(preg_match(" /^.+@.+\.[a-zA-Z]{2,}$/ ", $tab['login'])))
{
	echo"ERROR EMAIL not well formated\n";
	echo('<a href="index.php">Home page</a>');
	exit();
}

$resultat = mysqli_query($db, 'SELECT email FROM users');
while($donnees = mysqli_fetch_assoc($resultat))
{
	if ($donnees['email'] == $tab['login'])
	{
		echo"Your email is already use for an account\n";
		echo('<a href="index.php">Home page</a>');
		exit();
	}
}

$v1 = mysqli_real_escape_string($db, $tab['login']);
$v2 = $tab['passwd'];
$v3 = intval(0);
mysqli_query($db, "INSERT INTO users (email, passwd, admin_val) VALUES ('" . $v1 . "', '" . $v2 . "', '" . $v3 . "') ");
mysqli_free_result($resultat);
header('Location: index_login.php'); 
?>
