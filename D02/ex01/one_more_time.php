#!/usr/bin/php
<?php
function ft_split($str)
{
	$array = explode(" ", $str);
	$retarray = array_filter($array, 'strlen');
	return($retarray);
}

function ft_split_time($str)
{
	$array = explode(":", $str);
	$retarray = array_filter($array, 'strlen');
	return($retarray);
}

function error()
{
	echo"Wrong Format\n";
	exit();
}

function daytoday($str)
{
	if ($str == "Mon")
		return("lundi");
	if ($str == "Tue")
		return("mardi");
	if ($str == "Wed")
		return("mercredi");
	if ($str == "Thu")
		return("jeudi");
	if ($str == "Fri")
		return("vendredi");
	if ($str == "Sat")
		return("samedi");
	if ($str == "Sun")
		return("dimanche");
}

function month_to_digit($str)
{
	if ($str == "janvier")
		return(1);
	if ($str == "fevrier")
		return(2);
	if ($str == "mars")
		return(3);
	if ($str == "avril")
		return(4);
	if ($str == "mai")
		return(5);
	if ($str == "juin")
		return(6);
	if ($str == "juillet")
		return(7);
	if ($str == "aout")
		return(8);
	if ($str == "septembre")
		return(9);
	if ($str == "octobre")
		return(10);
	if ($str == "novembre")
		return(11);
	if ($str == "decembre")
		return(12);

}

date_default_timezone_set("Etc/GMT-1");

if ($argc <= 1)
	exit();

$str = $argv[1];
$nb_space = mb_substr_count($str, " ");
$array = ft_split($str);
$nbkey = count($array);
// print_r($array);

if ($nb_space != 4 || $nbkey != 5)
	error();

$day = $array[0];
$nb = $array[1];
$m = $array[2];
$year = $array[3];
$time = $array[4];

if (ctype_alpha($day))
	$day = strtolower($day);
else
	error();
if ($day != "lundi" && $day != "mardi" && $day != "mercredi" && $day != "jeudi" &&
 $day != "vendredi" && $day != "samedi" && $day != "dimanche")
	error();

if (strlen($nb) > 2 || !ctype_digit($nb) || $nb <= 0 || $nb > 31)
	error();

if (ctype_alpha($m))
	$m = strtolower($m);
else
	error();
if ($m != "janvier" && $m != "fevrier" && $m != "mars" && $m != "avril" && $m != "mai" && $m != "juin" &&
 $m != "juillet" && $m != "aout" && $m != "septembre" && $m != "octobre" && $m != "novembre" && $m != "decembre")
	error();

if (strlen($year) != 4 || !ctype_digit($year) || $year < 1000 || $year > 9999)
	error();

	
if (strlen($time) != 8 || !ctype_digit($time[0]) || !ctype_digit($time[1]) || $time[2] != ":" ||
!ctype_digit($time[3]) || !ctype_digit($time[4]) || $time[5] != ":" || !ctype_digit($time[6]) ||
!ctype_digit($time[7]))
	error();

	$arraytime = ft_split_time($time);
	$h = $arraytime[0];
$min = $arraytime[1];
$s = $arraytime[2];

if ($h < 0 || $min < 0 || $s < 0 || $h > 23 || $min > 59 || $s > 59)
error();

$mnb = month_to_digit($m);

if (!checkdate($mnb, $nb, $year))
	error();

$sec = mktime($h, $min, $s, $mnb, $nb, $year);

$realday = date('D', $sec);
$realday = daytoday($realday);
if ($day != $realday)
	error();

echo "$sec\n";
?>
