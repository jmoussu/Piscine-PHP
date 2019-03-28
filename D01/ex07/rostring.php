#!/usr/bin/php
<?php
function ft_split($str)
{
	$arrayexp = explode(" ", $str);
	$retarray = array_filter($arrayexp, 'strlen');
	return($retarray);
}
if ($argc >= 2)
{
	$i = 0;
	if (!$argv[1])
		exit();
	$array1 = ft_split($argv[1]);
	foreach ($array1 as $key1 => $value1)
	{
		$realArray[$i] = $value1;
		$i++;
	}
	$firstword = $realArray[0];
	if ($i == 1)
		echo"$firstword\n";
	else
	{
		foreach ($realArray as $key => $value)
		{
			if ($key == 0)
				echo"";
			else
				echo"$value ";
		}
		echo"$firstword\n";
	}
}
?>
