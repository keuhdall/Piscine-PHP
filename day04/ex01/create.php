<?php
	$tab = array();
	$err = false;
	if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] == "OK")
	{

		$pwd = hash("whirlpool", $_POST['passwd']);
		if (!file_exists("../private"))
			mkdir("../private", 0700);
		if (file_exists("../private/passwd"))
		{
			$tab = unserialize(file_get_contents("../private/passwd"));
			foreach ($tab as $elem) {
				if ($elem['login'] === $_POST["login"])
				{
					echo "ERROR"."\n";
					$err = true;
					break;
				}
			}
		}
		if ($err == false)
		{
			$account = array('login' => $_POST['login'], 'passwd' => $pwd);
			array_push($tab, $account);
			file_put_contents("../private/passwd", serialize($tab));
			echo "OK"."\n";
		}
	}
	else
		echo "ERROR"."\n";
?>