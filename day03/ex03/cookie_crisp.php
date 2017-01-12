<?PHP
/*
	foreach ($_GET as $key => $value) {

	}
*/
	if ($_GET["action"] == "set")
		setcookie($_GET["name"], $_GET["value"]);
	elseif ($_GET["action"] == "get")
		echo $_COOKIE[$_GET["name"]]."\n";
	elseif ($_GET["action"] == "del")
		setcookie($_GET["name"], $_COOKIE[$_GET["value"]], -1);
?>