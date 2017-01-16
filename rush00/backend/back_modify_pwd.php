<?php
	session_start();
	$err = false;
	if (!$_POST['oldpwd'] || !$_POST['newpwd'] || !$_POST['confirmpwd'] || $_POST['submit'] != "OK")
		header("Location: ../user_info.php?error=1");
	else
	{
		if ($_POST['newpwd'] != $_POST['confirmpwd'])
		{
			header("Location: ../user_info.php?error=2");
			exit();
		}
		$cn = mysqli_connect('localhost', 'root', 'root');
		if (mysqli_connect_errno()) {
			die("Database connection failed".mysqli_connect_error());
		}
		mysqli_select_db($cn, 'my_database');
		$query = "SELECT password FROM Users WHERE login='".$_SESSION['username']."'";
		$result = mysqli_query($cn, $query);
		$row = mysqli_fetch_assoc($result);
		if ($row['password'] != hash("whirlpool", $_POST['oldpwd']))
			header("Location: ../user_info.php?error=3");
		else
		{
			$query = "UPDATE Users SET password='".hash("whirlpool", $_POST['newpwd'])."' WHERE login='".$_SESSION['username']."'";
			mysqli_query($cn, $query);
			header("Location: ../user_info.php?error=4");
		}
	}
?>
