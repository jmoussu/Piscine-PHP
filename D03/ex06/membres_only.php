<?php
//	http://e3r9p16.42.fr:8100/Desktop/PHP_MonGit/D03/ex06/membres_only.php



if (!($_SERVER['PHP_AUTH_USER'])) 
{
	header('HTTP/1.0 401 Unauthorized');
	header('WWW-Authenticate: Basic realm="\'Espace membres\'"');
	echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>";
	
} 
else if ($_SERVER['PHP_AUTH_USER'] == 'zaz' && $_SERVER['PHP_AUTH_PW'] == "jaimelespetitsponeys"){
	$file =  '../img/42.png';
	$str = base64_encode(file_get_contents($file));
	echo"<html><body>\nBonjour Zaz<br />\n<img src='data:image/png;base64,$str'>\n</body></html>\n";
}
else
{
	header('HTTP/1.0 401 Unauthorized');
	header("WWW-Authenticate: Basic realm=''Espace membres''");
	echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n";
}
?>
