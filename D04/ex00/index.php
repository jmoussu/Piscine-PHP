<?php
$rets = session_start();
// if ($rets == 0)
// 	echo"rets == $rets // Session could't start\n";
if ($_GET['submit'] == "OK")
{
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
}
?>
<html><body>
<form>
	Identifiant: <input name="login" value="<?php echo $_SESSION['login'] ?>" />
	<br />
	Mot De passe: <input name="passwd" value="<?php echo $_SESSION['passwd'] ?>" />
	<input type="submit" name="submit" value="OK"/>
</form>
</body></html>
