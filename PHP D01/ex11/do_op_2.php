#!/usr/bin/php
<?php

function error()
{
	echo "Syntax Error\n";
	exit();
}

if ($argc != 2) 
{
	echo"Incorrect Parameters\n";
	exit();
}

$str = $argv[1];
$str = str_replace(' ','',$str);
$str = str_replace("\t",'',$str);

$strlen = strlen($str);
if ($strlen <= 2)
	error();
	
if ($str[0] == '+' && $str[1] >= '0' && $str[1] <= '9')
{
	$str = substr($str, 1);
}

$a = intval($str);
$opp = substr(substr($str, strlen((string)$a)), 0, 1);
$b = substr(substr($str, strlen((string)$a)), 1);

if ( !is_numeric($a) || !is_numeric($b))
	error();

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
