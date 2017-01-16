<?php include("backend/navbar.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Memeshop, worldwide meme provider since 2017</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/navbar.css">
	<link rel="stylesheet" href="css/form.css">
	<link rel="stylesheet" href="css/order_display.css">

</head>
<body>

	<div class="form">
		<form action="backend/back_modify_email.php" method="post">
			Old Email: <input type="email" name="oldemail" placeholder="example@example.com"><br>
			New Email: <input type="email" name="newemail" placeholder="example@example.com"><br>
			Confirm: <input type="email" name="confirmemail" placeholder="example@example.com"><br>
			<input class="submit" name="submit" type="submit" value="OK">
		</form>
	</div>

	<div class="form">
		<form action="backend/back_modify_pwd.php" method="post">
			Old Passworld: <input type="password" name="oldpwd" placeholder="Pass"><br>
			New Password: <input type="password" name="newpwd" placeholder="New pass"><br>
			Confirm: <input type="password" name="confirmpwd" placeholder="Confirm"><br>
			<input class="submit" name="submit" type="submit" value="OK">
		</form>
	</div>

	<p class="error-message"><?php
		$error = $_GET['error'];
		if ($error == 1) {
			echo "Please fill out all the fields in the form.";
		} else if ($error == 2) {
			echo "The passwords do not match.";
		} else if ($error == 3) {
			echo "Wrong password";
		} else if ($error == 4) {
			echo "Password changed successfully";
		} else if ($error == 5) {
			echo "The addresses do not match.";
		} else if ($error == 6) {
			echo "Wrong adress.";
		} else if ($error == 7) {
			echo "Email changed successfully.";
		}?></p>
	<hr>
	<h1 style="text-align:center">Orders placed : </h1>

	<!-- Code for each order -->
	<?php
		$cn = mysqli_connect('localhost', 'root', 'root');
		if (mysqli_connect_errno()) {
			die("Database connection failed".mysqli_connect_error());
		}
		mysqli_select_db($cn, 'my_database');
		$query = "SELECT cart FROM Orders WHERE login='".$_SESSION['username']."'";
		$result = mysqli_query($cn, $query);
		while ($row = mysqli_fetch_assoc($result))
		{
			echo "<div class=\"order-container\">";
			$cart = explode(";", $row['cart']);
			$total = 0;
			foreach ($cart as $item) {
				$inv = explode(":", $item);
				echo "<div class=\"product-line\">".$inv[0]." : ".$inv[1]."</div>";
				$total += $inv[1];
			}
			echo "<div class=\"total\">Total : ".$total." memes</div></div>";
		}
	?>

</body>
</html>
