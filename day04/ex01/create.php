<?php
	$err = false;

	$tab[0] = $_POST['login'];
	$tab[1] = $_POST['passwd'];
	if ($tab[0] && $tab[1] && $_POST['submit'] == "OK")
	{

		if (!file_exists("../private"))
			mkdir("../private", 0700);
		if (file_exists("../private/passwd"))
			$tab2 = unserialize(file_get_contents("../private/passwd"));
		$tab = hash("whirlpool", $tab[1]);

		foreach ($tab as $elem) {
			if ($elem === $_POST['login']);
			{
				echo "ERROR"."\n";
				$err = true;
				break;
			}
		}
		if (!$err)
		{
			file_put_contents("../private/passwd", serialize($tab), FILE_APPEND);
			echo "OK"."\n";
		}

	}
	else
		echo "ERROR"."\n";
?>