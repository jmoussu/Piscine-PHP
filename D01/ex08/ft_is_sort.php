#!/usr/bin/php
<?php
function ft_is_sort($tab)
{
	$sorttab = $tab;
	sort($sorttab);
	$nb = count($tab);
	$i = 0;
	while ($i < $nb)
	{
		if ($tab != $sorttab)
			return (0);
		$i++;
	}
	return(1);
}
?>
