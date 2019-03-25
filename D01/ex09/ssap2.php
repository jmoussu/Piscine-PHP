#!/usr/bin/php
<?php
function ft_split($str)
{
	$arrayexp = explode(" ", $str);
	$retarray = array_filter($arrayexp, 'strlen');
	return($retarray);
}

function give_value($a)
{
	if (ord($a) >= 48 && ord($a) <= 57)
		return(ord($a) + 256);
	else if (ord($a) >= 97 && ord($a) <= 122)
		return(ord($a) - 32);
	else if (ord($a) >= 65 && ord($a) <= 90)
		return(ord($a));
	else
		return(ord($a) + 10000);
}

function custom_sort($a, $b)
{
	$i = 0;
	while (($i < strlen($a)) || ($i < strlen($b)))
	{
		$av = give_value($a[$i]);
		$bv = give_value($b[$i]);
		if ($av < $bv)
			return (-1);
		else if ($av > $bv)
			return (1);
		else
			$i++;
	}
		return 0;
}

if ($argc <= 1)
{
	exit();
}
$i = 1;
while ($i < $argc)
{
	$doubleArray[$i] = ft_split($argv[$i]);
	$i++;
}
$count = 0;
foreach ($doubleArray as $y => $Array)
{
	foreach ($Array as $key => $value)
	{
		$key = $count;
		$finalArray[$key] = $value;
		$count++;
	}
}
usort($finalArray, "custom_sort");
foreach ($finalArray as $keyf => $valuef)
{
		echo"$valuef\n";
}
?>
