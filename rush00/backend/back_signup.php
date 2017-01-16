<?php
	function ft_isAdmin($email)
	{
		$tab = explode("@", $email);
		if ($tab[1] == "admin.com")
			return true;
		else
			return false;
	}

	$err = false;
	if (!$_POST['username'] || !$_POST['email'] || !$_POST['confirmemail'] ||
		!$_POST['pwd'] || !$_POST['confirmpwd'] || $_POST['submit'] != "OK")
	{
		header("Location: ../signup.php?error=1");
	}
	else
	{
		if (($_POST['email'] != $_POST['confirmemail']) ||
			($_POST['pwd'] != $_POST['confirmpwd']))
		{
			header("Location: ../signup.php?error=2");
			exit();
		}
		$cn = mysqli_connect('localhost', 'root', 'root');
		if (mysqli_connect_errno()) {
			die("Database connection failed".mysqli_connect_error());
		}

		mysqli_select_db($cn, 'my_database');
		$query = "SELECT * FROM Users";
		$result = mysqli_query($cn, $query);

		while ($row = mysqli_fetch_assoc($result))
		{
			if ($row['login'] == $_POST['username'])
			{
				header("Location: ../signup.php?error=3");
				$err = true;
				break;
			}
			if ($row['email'] == $_POST['email'])
			{
				header("Location: ../signup.php?error=4");
				$err = true;
				break;
			}
		}
		if (!$err)
		{
			$isAdmin = (ft_isAdmin($_POST['email'])) ? "1" : "0";
			$query = "INSERT INTO Users (login, password, email, isAdmin) VALUES (
			'".$_POST['username']."', '".hash("whirlpool", $_POST['pwd'])."', '".$_POST['email'].
			"', '".$isAdmin."')";
			mysqli_query($cn, $query);
			header("Location: ../signup.php?error=5");
		}
	}
?>
