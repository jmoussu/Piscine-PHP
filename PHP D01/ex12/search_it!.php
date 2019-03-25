#!/usr/bin/php
<?php
if ($argc <= 2)
	exit();
$tofind = $argv[1];
$nb = $argc - 2;

while ($nb != 0)
{
	$str = $argv[$nb + 1];
	$pos = strpos($argv[$nb + 1], ":");
	$key = substr($str, 0, $pos);
	// echo" La clef pour nb = $nb est: $key ";
	if ($key == $tofind)
	{
		$res = substr($str, $pos + 1);
		echo"$res\n";
		exit();
	}
	$nb--;
}
?>
