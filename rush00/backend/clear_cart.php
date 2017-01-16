<?php
	session_start();
	foreach ($_SESSION as $key => $value) {
		if ($key != 'username' && $key != 'admin') {
			unset($_SESSION[$key]);
		}
	}
	header("Location: ../cart_display.php", true, 302);
?>
