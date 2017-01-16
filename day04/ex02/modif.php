<?php
	function ft_check($login, $passwd, $tab)
	{
		if (file_exists("../private/passwd"))
		{
			$tab = unserialize(file_get_contents("../private/passwd"));
			$found_login = false;
			$found_passwd = false;
			foreach ($tab as $elem) {
				if ($elem['login'] === $_POST['login'])
					$found_login = true;
				if ($elem['passwd'] === hash("whirlpool", $_POST['oldpw']))
					$found_passwd = true;
			}
			if ($found_login && $found_passwd)
				return $tab;
			else
				return false;
		}
		else
			return false;
	}

	$count = 0;
	$tab = array();
	$new_pw = hash("whirlpool", $_POST['newpw']);

	if ($_POST['login'] && $_POST['oldpw'] &&  $_POST['newpw'] &&
		$_POST['submit'] == "OK" && ($tab = ft_check($_POST['login'], $_POST['passwd'], $tab)))
	{
		if (!file_exists("../private"))
			mkdir("../private", 0700);
		foreach ($tab as $elem) {
			if ($elem['login'] === $_POST['login'])
				$tab[$count]['passwd'] = $new_pw;
			$count++;
		}
		file_put_contents("../private/passwd", serialize($tab));
		echo "OK"."\n";
	}
	else
		echo "ERROR"."\n";
?>