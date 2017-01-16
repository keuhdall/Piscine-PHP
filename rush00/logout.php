<?php
	header("Location: index.php", true, 302);
	session_start();
	session_destroy();
?>