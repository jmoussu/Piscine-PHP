<?php
$rets = session_start();
if ($rets == 0)
	echo"rets == $rets // Session could't start\n";
$_SESSION['animal']  = 'cat';
print_r($_SESSION);
// echo'<html><body>
// <form>
// 	Identifiant: <input name="login" value="" />
// 	<br />
// 	Mot De passe: <input name="passwd" value="" />
// 	<input type="submit" />
// <form>
// </body></html>
// ';
?>
<html><body>
<form>
	Identifiant: <input name="login" value="" />
	<br />
	Mot De passe: <input name="passwd" value="" />
	<input type="submit" />
<form>
</body></html>
