<?php
	session_start();
	if ($_GET["submit"] == "OK")
	{
		$_SESSION["login"] = $_GET["login"]."\n";
		$_SESSION["passwd"] = $_GET["password"]."\n";		
	}
?>
<html>
	<body>
		<form action="" method="GET">
			<input type="text" name="login" placeholder="Login : " value="<?php echo $_SESSION['login']?>"><br/>
			<input type="password" name="password" placeholder="Mot de passe : " value="<?php echo $_SESSION['passwd']?>"><br/>
			<input type="submit" name="submit" value="OK"><br/>
		</form>
	</body>
</html>