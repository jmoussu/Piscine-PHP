<?php
include ('function/connexion_root_sql.php');
include("function/auth.php");
session_start();

$login = $_POST['login'];
$passwd = $_POST['passwd'];

if (!(auth($login, $passwd)))
{
	echo"ERROR WRONG INFORMATIONS\n";
	echo"<br/>";
	$_SESSION['loggued_on_user'] = "";
	return(0);
}

$_SESSION['loggued_on_user'] = $login;
echo"You are logged\n";
header('Location: index.php'); 
?>
<a href="index.php"><button type="Index" >Index</button></a>
