<?php
if (!(file_exists("../htdocs")))
	mkdir("../htdocs");
if (!(file_exists("../htdocs/private")))
	mkdir("../htdocs/private");

if (!(file_exists("../htdocs/private/passwd")))
	file_put_contents("../htdocs/private/passwd", "");

if ($_POST['submit'] != "OK")
	$error = 1;

if (!($_POST['login']) || !($_POST['passwd']))
	$error = 1;

$tab = [
	"login" => $_POST['login'],
	"passwd" => hash('whirlpool', $_POST['passwd']) 
];
$big_tab_str = file_get_contents("../htdocs/private/passwd");
$big_tab = unserialize($big_tab_str);

foreach($big_tab as $key => $old_tab)
{
	if ($tab['login'] == $old_tab['login'])
	{
		$error = 1;
	}
}
if ($error != 1)
{
	$big_tab[] = $tab;
	file_put_contents("../htdocs/private/passwd", serialize($big_tab));
	echo"OK\n";
}
else
	echo"ERROR\n";
?>
