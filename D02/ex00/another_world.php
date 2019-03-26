#!/usr/bin/php
<?php

function ft_split($str)
{
	$str = trim($str);
	$array = preg_split("/[\s]+/", $str);
	return($array);
}
if ($argc >= 2)
{
	$array = ft_split($argv[1]);
	$count = -1;
	foreach ($array as $key1 => $value1)
	{
		$count++;
	}

	foreach ($array as $key => $value)
	{
		if ($key == $count)
			echo"$value\n";
		else
		echo"$value ";
	}
}
?>
