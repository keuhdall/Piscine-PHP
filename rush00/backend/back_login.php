<?php
	$err = false;
	function ft_check_user($user, $password)
	{
		global $cn;

		$query = "SELECT * FROM Users";
		$result = mysqli_query($cn, $query);
		$password = hash("whirlpool", $password);
		while ($row = mysqli_fetch_assoc($result))
		{
			if ($row['login'] === $user &&
				$row['password'] === $password)
				return $user;
		}
		return false;
	}

	function ft_check_admin($username)
	{
	  $cn = mysqli_connect('localhost', 'root', 'root');
	  if (mysqli_connect_errno()) {
		die("Database connection failed".mysqli_connect_error());
	  }
	  mysqli_select_db($cn, 'my_database');
	  $query = "SELECT login, isAdmin FROM Users";
	  $result = mysqli_query($cn, $query);
	  while ($row = mysqli_fetch_assoc($result))
	  {
		if ($row['login'] === $username &&
		  $row['isAdmin'] === "1")
		  return true;
	  }
	  return false;
	}

	if (!$_POST['username'] || !$_POST['pwd'] || $_POST['submit'] != "OK")
		header("Location: ../login.php?status=ko", true, 302);
	else
	{
		$cn = mysqli_connect('localhost', 'root', 'root');
		if (mysqli_connect_errno()) {
			die("Database connection failed".mysqli_connect_error());
		}
		mysqli_select_db($cn, 'my_database');
		if ($user = ft_check_user($_POST['username'], $_POST['pwd']))
		{
			session_start();
			$_SESSION['username'] = $user;
			if (ft_check_admin($_SESSION['username']))
				$_SESSION['admin'] = 1;
			header("Location: ../index.php", true, 302);
		}
		else
			header("Location: ../login.php?status=ko", true, 302);
	}
?>
