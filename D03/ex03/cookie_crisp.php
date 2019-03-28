<?php
// cd ~
// php -S localhost:8100
// curl (-c set del) (-b get) 'http://localhost:8100/Desktop/PHP_MonGit/D03/ex03/cookie_crisp.php'
//curl -c cook.txt 'http://localhost:8100/Desktop/PHP_MonGit/D03/ex03/cookie_crisp.php?action=set&name=plat&value=MERDE'
//curl -b cook.txt 'http://localhost:8100/Desktop/PHP_MonGit/D03/ex03/cookie_crisp.php?action=get&name=plat'
// curl -c cook.txt 'http://localhost:8100/Desktop/PHP_MonGit/D03/ex03/cookie_crisp.php?action=del&name=plat'



$action = $_GET['action'];

if ($action == "set")
{
	$var1 = $_GET['name'];
	$var2 = $_GET['value'];
	if ($var1 && $var2)
	{
		setcookie($var1, $var2, time()+3600*24);
	}
}
if ($action == "get")
{
	$var1 = $_GET['name'];
	if ($var1 && $_COOKIE[$var1])
	{
		echo"$_COOKIE[$var1]\n";
	}
}
if ($action == "del")
{
	setcookie($var1, "", time()-3600*24);
}


?>
