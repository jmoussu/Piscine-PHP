<?php
// cd ~
// php -S localhost:8100
// curl 'http://localhost:8100/Desktop/PHP_MonGit/D03/ex02/print_get.php?Key1=VALUE1'

if ($_GET)
{
	foreach($_GET as $key => $value)
	{
		echo"$key: $value\n";
	}
}
?>
