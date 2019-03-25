#!/usr/bin/php
<?php

include("ft_is_sort.php");

$tab =array("AAAA", "aaa", "zzzz", "1458", "EEEE");
$tab[] = "AAA";

if (ft_is_sort($tab))
	echo "Le tableau est trie\n";
else
	echo "Le tableau n'est pas trie\n";
?>
