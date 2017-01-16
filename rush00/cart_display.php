<?php
	include("backend/navbar.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Memeshop, worldwide meme provider since 2017</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/navbar.css">
	<link rel="stylesheet" href="css/cart_display.css">
</head>
<body>

<h1 style="text-align:center">Your cart</h1>
<?php
	$cn = mysqli_connect('localhost', 'root', 'root');
	if (mysqli_connect_errno()) {
    	die("Database connection failed".mysqli_connect_error());
    }
    mysqli_select_db($cn, 'my_database');
    $query = "SELECT * FROM Products";
    $result = mysqli_query($cn, $query);
	$total = 0;
    while ($row = mysqli_fetch_assoc($result))
    {
		if ($_SESSION[$row['name']] > 0) {
			$total = $total + $_SESSION[$row['name']] * $row['price'];
			echo "
			<div class=\"container-produit\">
				<img class=\"img-produit\" src=\"img/".$row['img']."\">
				<div class=\"nom-produit\">".$row['name']."</div>
				<div class=\"description-produit\">".$row['description']."</div>
				<div class=\"price\">".$row['price']."$</div>
				<div class=\"quantity\">Quantity : ".$_SESSION[$row['name']]."pcs</div>
				<div class=\"subtotal\">Sub-total : ".$_SESSION[$row['name']] * $row['price']."$.</div>
				<form class=\"plusbutton\" action=\"backend/back_cart.php\" method=\"get\">
					<input type=\"hidden\" name=\"action\" value=\"addproduct\">
					<input type=\"hidden\" name=\"name\" value=\"".$row['name']."\">
					<input type=\"submit\" value=\"+\">
				</form>
				<form class=\"minusbutton\" action=\"backend/back_cart.php\" method=\"get\">
					<input type=\"hidden\" name=\"action\" value=\"removeproduct\">
					<input type=\"hidden\" name=\"name\" value=\"".$row['name']."\">
					<input type=\"submit\" value=\"-\">
				</form>
			</div>";
		}
    }
	echo "<h2 style=\"text-align:center\">Your Total : $total$</h2>";
?>
<?php
	if ($_SESSION['username']) {
		echo "<h2 style=\"text-align:center\"><a href=\"backend/save_cart.php\">>>SAVE CART TO ACCOUNT<<</a></h2>
			  <h2 style=\"text-align:center\"><a href=\"backend/parse_cart_string.php\">>>LOAD CART FROM ACCOUNT<<</a></h2>
			  <h2 style=\"text-align:center\"><a href=\"backend/register_order.php\">>>ORDER YOUR MEMES<<</a></h2>
			  <h2 style=\"text-align:center\"><a href=\"backend/clear_cart.php\">>>CLEAR CART<<</a></h2>";
	} else {
		echo "<h2 style=\"text-align:center\">Please <a href=\"signup.php\">register</a> or <a href=\"login.php\">sign in</a> to manage your cart.</h2>";
	}
?>
</body>
</html>
