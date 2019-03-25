#!/usr/bin/php
<?php
$rand = rand(0, 1);
if ($argc <= 1)
	exit();
$str= $argv[1];
if ($str == "mais pourquoi cette demo ?")
	echo"Tout simplement pour qu'en feuilletant le sujet\non ne s'apercoive pas de la nature de l'exo\n";
if ($str == "mais pourquoi cette chanson ?")
	echo"Parce que Kwame a des enfants\n";
if ($str == "vraiment ?")
{
	if ($rand == 0)
		echo"Nan c'est parce que c'est le premier avril\n";
	else
		echo"Oui il a vraiment des enfants\n";
}
?>
