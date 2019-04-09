<?php
function auth($login, $passwd)
{
	include ('function/connexion_root_sql.php');
	if	(!($login) || !($passwd))
		return(FALSE);

	$passwd = hash('whirlpool', $passwd); 
	$good_info = 0;
	// echo "$login $passwd <br><br>";
	$resultat = mysqli_query($db, 'SELECT email, passwd FROM users');
	while($donnees = mysqli_fetch_assoc($resultat))
	{
		if ($login == $donnees['email'] && $passwd == $donnees['passwd'])
			$good_info = 1;
	}
	mysqli_free_result($resultat);
	if ($good_info == 1)
		return(TRUE);
	else
		return(FALSE);
}
?>
