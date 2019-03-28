<?php
function ft_split($str)
{
	$array = explode(" ", $str);
	$retarray = array_filter($array, 'strlen');
	sort($retarray);
	return($retarray);
}
/*
 ## Version full space ##
function ft_split($str)
{
	$str = trim($str);
	$array = preg_split("/[\s]+/", $str);
	sort($array);
	return($array);
}
*/
?>
