<?php
function auth($login, $passwd)
{
	if	(!($login) || !($passwd))
		return(FALSE);

	$passwd = hash('whirlpool', $passwd); 

	$big_tab_str = file_get_contents("../htdocs/private/passwd");
	$big_tab = unserialize($big_tab_str);
	if	(!$big_tab)
		return(FALSE);

	foreach($big_tab as $key => $old_tab)
	{
		if ($passwd == $old_tab['passwd'] && $login == $old_tab['login'])
		{
			$good_info = 1;
		}
	}
	if ($good_info != 1)
		return(FALSE);
	else
		return(TRUE);
}
?>
