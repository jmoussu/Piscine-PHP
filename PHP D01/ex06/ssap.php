#!/usr/bin/php
<?php
function ft_split($str)
{
	$arrayexp = explode(" ", $str);
	$retarray = array_filter($arrayexp, 'strlen');
	return($retarray);
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
sort($finalArray);
foreach ($finalArray as $keyf => $valuef)
{
		echo"$valuef\n";
}
?>
