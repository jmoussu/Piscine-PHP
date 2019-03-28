#!/usr/bin/php
<?php
while(1)
{
	echo "Entrez un nombre: ";
	$in = trim(fgets(STDIN));
	if (feof(STDIN) == TRUE)
	{
		echo"\n";
		exit();
	}
	if (is_numeric($in) == 0)
	{
		echo "'$in' n'est pas un chiffre\n";
	}
	else
	{
		if ($in % 2 == 0 || $in == 0)
			echo"Le chiffre $in est Pair\n";
		else
			echo"Le chiffre $in est Impair\n";
	}
}
?>
