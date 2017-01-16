<?php
	session_start();
	foreach ($_SESSION as $key => $value) {
		if ($key != 'username' && $key != 'admin') {
			unset($_SESSION[$key]);
		}
	}
	$cn = mysqli_connect('localhost', 'root', 'root');
	if (mysqli_connect_errno()) {
		die("Database connection failed".mysqli_connect_error());
	}
	mysqli_select_db($cn, 'my_database');

	$query = "SELECT cart FROM Cart WHERE Cart.login = '".$_SESSION['username']."'";
	$result = mysqli_query($cn, $query);
	$row = mysqli_fetch_assoc($result);
	$cart = explode(";", $row['cart']);
	foreach ($cart as $item) {
		$inv = explode(":", $item);
		$_SESSION[$inv[0]] = $inv[1];
	}
	header("Location: ../cart_display.php");
?>
