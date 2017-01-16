<?php
	session_start();
	$err = false;
	if (!$_POST['oldemail'] || !$_POST['newemail'] || !$_POST['confirmemail'] ||$_POST['submit'] != "OK")
		header("Location: ../user_info.php?error=1");
	else
	{
		if ($_POST['newemail'] != $_POST['confirmemail'])
		{
			header("Location: ../user_info.php?error=5");
			exit();
		}
		$cn = mysqli_connect('localhost', 'root', 'root');
		if (mysqli_connect_errno()) {
			die("Database connection failed".mysqli_connect_error());
		}
		mysqli_select_db($cn, 'my_database');
		$query = "SELECT email FROM Users WHERE login='".$_SESSION['username']."'";
		$result = mysqli_query($cn, $query);
		$row = mysqli_fetch_assoc($result);
		if ($row['email'] != $_POST['oldemail'])
			header("Location: ../user_info.php?error=6");
		else
		{
			$query = "UPDATE Users SET email='".$_POST['newemail']."' WHERE login='".$_SESSION['username']."'";
			mysqli_query($cn, $query);
			header("Location: ../user_info.php?error=7");
		}
	}
?>
