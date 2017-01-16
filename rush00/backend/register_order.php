<?php
	session_start();
	header("Location: ../cart_display.php", true, 302);
	$tab = array();
	$cn = mysqli_connect('localhost', 'root', 'root');
	if (mysqli_connect_errno()) {
    	die("Database connection failed".mysqli_connect_error());
    }
    mysqli_select_db($cn, 'my_database');

    $query = "SELECT name FROM Products";
    $result = mysqli_query($cn, $query);
    while ($row = mysqli_fetch_assoc($result))
    {
    	if ($_SESSION[$row['name']])
    	{
    		array_push($tab, $row['name'].":");
    		array_push($tab, $_SESSION[$row['name']].";");
    	}
    }
    $cart = implode("", $tab);
	$cart = rtrim($cart, ';');

	$query = "INSERT INTO Orders (login, cart) VALUES ('".$_SESSION['username']."', '".$cart."')";
    mysqli_query($cn, $query);

	$query = "DELETE FROM Cart WHERE login='".$_SESSION['username']."'";
	mysqli_query($cn, $query);

	foreach ($_SESSION as $key => $value) {
		if ($key != 'username' && $key != 'admin') {
			unset($_SESSION[$key]);
		}
	}
?>
