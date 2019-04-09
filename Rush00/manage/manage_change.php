<?php
include ('../function/connexion_root_sql.php');
session_start();
if ($_POST['submit'] != "OK")
{
	echo"ERROR submit is not \"OK\"\n";
	exit();
}

if (!($_POST['newlogin']) || !($_POST['newpasswd']))
{
	echo"ERROR Empty informations\n";
	exit();
}

if (strlen($_POST['newpasswd']) < 6)
{
	echo"ERROR Your password need at leat 6 charactere\n";
	exit();
}

$tab = [
	"login" => $_POST['newlogin'],
	"passwd" => hash('whirlpool', $_POST['newpasswd']) 
];

if (!(preg_match(" /^.+@.+\.[a-zA-Z]{2,}$/ ", $tab['login'])))
{
	echo"ERROR EMAIL not well formated\n";
	exit();
}

$v1 = mysqli_real_escape_string($db, $tab['login']);
$v2 = $tab['passwd'];

$v3 = $_SESSION['loggued_on_user'];
mysqli_query($db, "UPDATE `users` SET `email`='". $v1  ."',`passwd`='". $v2  ."' WHERE email = '".  $v3  ."';");

print_r($_SESSION);
header('Location: ../logout.php'); 
?>
