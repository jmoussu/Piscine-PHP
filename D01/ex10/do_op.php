#!/usr/bin/php
<?php

if ($argc != 4) 
{
	echo"Incorrect Parameters\n";
	exit();
}
$a = trim($argv[1]); 
$b = trim($argv[3]);
$opp = trim($argv[2]);
if ($opp == "+")
{
	$res = $a + $b;
	echo"$res\n";
}

if ($opp == "-")
{
	$res = $a - $b;
	echo"$res\n";
}

if ($opp == "*")
{
	$res = $a * $b;
	echo"$res\n";
}

if ($opp == "/")
{
	$res = $a / $b;
	echo"$res\n";
}

if ($opp == "%")
{
	$res = $a % $b;
	echo"$res\n";
}

?>
