<?php
	session_start();
	header("Location: ../cart_display.php", true, 302);
	$tab = array();
	$cn = mysqli_connect('localhost', 'root', 'root');
	if (mysqli_connect_errno()) {
    	die("Database connection failed".mysqli_connect_error());
    }
    mysqli_select_db($cn, 'my_database');

	$query = "SELECT COUNT(login) FROM Cart WHERE login='".$_SESSION['username']."'";
	$result = mysqli_query($cn, $query);
	$count = mysqli_fetch_array($result);

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
	if ($count[0] > 0)
    	$query = "UPDATE Cart SET cart='".$cart."' WHERE login='".$_SESSION['username']."'";
	else
		$query = "INSERT INTO Cart (login, cart) VALUES ('".$_SESSION['username']."', '".$cart."')";
    mysqli_query($cn, $query);
?>
