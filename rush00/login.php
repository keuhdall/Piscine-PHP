<?php include("backend/navbar.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Memeshop, worldwide meme provider since 2017</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/navbar.css">
	<link rel="stylesheet" href="css/form.css">
</head>
<body>

<div class="form">
	<form action="backend/back_login.php" method="post">
		Username: <input type="text" name="username" placeholder="Username"><br>
		Password: <input type="password" name="pwd" placeholder="Password"><br>
		<input class="submit" name="submit" type="submit" value="OK">
	</form>
</div>

<p class="error-message"><?php
	$status = $_GET['status'];
 	if ($status == "ko")
		echo "Invalid credentials.";
?></p>

</body>
</html>
