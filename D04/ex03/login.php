<?php

include("auth.php");
session_start();

$login = $_GET['login'];
$passwd = $_GET['passwd'];

if (!(auth($login, $passwd)))
{
	echo"ERROR\n";
	$_SESSION['loggued_on_user'] = "";
	return(0);
}
$_SESSION['loggued_on_user'] = $login;
echo"OK\n";

?>
