<?php
	session_start();
	header("Location:".$_SERVER['HTTP_REFERER'], true, 302);
	if ($_GET['action'] == 'addproduct') {
		if (!$_SESSION[$_GET['name']])
			$_SESSION[$_GET['name']] = 1;
		else
			$_SESSION[$_GET['name']]++;
	} else if ($_GET['action'] == 'removeproduct') {
		$_SESSION[$_GET['name']]--;
	}
?>
