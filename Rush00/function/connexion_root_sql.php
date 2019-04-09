<?php

if($db = mysqli_connect('127.0.0.1', 'root', 'admin123', 'rush00'))
{
}
else // Mais si elle rate…
{
	echo "Erreur admin\n"; // On affiche un message d'erreur.
	exit();
}

?>
