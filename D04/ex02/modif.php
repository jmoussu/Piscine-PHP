<?php
if ($_POST['submit'] != "OK")
{
	echo"ERROR\n";
	return(0);
}



if (!($_POST['login']) || !($_POST['oldpw']) || !($_POST['newpw']))
{
	echo"ERROR\n";
	return(0);
}

$big_tab_str = file_get_contents("../htdocs/private/passwd");
$big_tab = unserialize($big_tab_str);

if (!$big_tab)
{
	echo"ERROR\n";
	return(0);
}

$tab = [
	"login" => $_POST['login'],
	"oldpw" => hash('whirlpool', $_POST['oldpw']),
	"newpw" => hash('whirlpool', $_POST['newpw']) 
];

foreach($big_tab as $key => $old_tab)
{
	if ($tab['oldpw'] == $old_tab['passwd'] && $tab['login'] == $old_tab['login'])
	{
		$good_info = 1;
		$savekey = $key;
	}
}

if ($good_info != 1)
{
	echo"ERROR\n";
	return(0);
}

$big_tab[$savekey]['passwd'] = $tab['newpw'];
file_put_contents("../htdocs/private/passwd", serialize($big_tab));
echo"OK\n";

?>
