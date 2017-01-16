<?php include("backend/navbar.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Memeshop, worldwide meme provider since 2017</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/navbar.css">
	<link rel="stylesheet" href="css/form.css"
</head>
<body>

<div class="form">
	<form action="backend/back_signup.php" method="post">
		Username: <input type="text" name="username" placeholder="Username"><br>
		Email: <input type="email" name="email" placeholder="example@example.com"><br>
		Confirm email: <input type="email" name="confirmemail" placeholder="example@example.com"><br>
		Password: <input type="password" name="pwd" placeholder="password"><br>
		Repeat Password: <input type="password" name="confirmpwd" placeholder="password"><br>
		<input class="submit" name="submit" type="submit" value="OK">
	</form>
</div>

<p class="error-message"><?php
	$error = $_GET['error'];
	if ($error == 1) {
		echo "Please fill out all the fields in the form.";
	} else if ($error == 2) {
		echo "The email addresses or passwords do not match.";
	} else if ($error == 3) {
		echo "Username already in use.";
	} else if ($error == 4) {
		echo "Email adress already in use.";
	} else if ($error == 5) {
		echo "Account created successfully.";
	}?></p>
</body>
</html>
