<?php include("backend/navbar.php");?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Memeshop, worldwide meme provider since 2017</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/navbar.css">
	<link rel="stylesheet" href="css/product_display.css">
</head>
<body>
<h1 style="text-align:center">Our Products</h1>
<?php
	$cn = mysqli_connect('localhost', 'root', 'root');
	if (mysqli_connect_errno()) {
		die("Database connection failed".mysqli_connect_error());
	}
	mysqli_select_db($cn, 'my_database');
	$filter = $_GET['category'];
	if ($filter == "all")
	{
		$query = "SELECT * FROM Products";
		$result = mysqli_query($cn, $query);
		while ($row = mysqli_fetch_assoc($result))
		{
			echo "
			<div class=\"container-produit\">
				<img class=\"img-produit\" src=\"img/".$row['img']."\">
				<div class=\"nom-produit\">".$row['name']."</div>
				<div class=\"description-produit\">".$row['description']."</div>
				<div class=\"price\">".$row['price']."$</div>
				<form class=\"cart-button\" action=\"backend/back_cart.php\" method=\"get\">
					<input type=\"hidden\" name=\"action\" value=\"addproduct\">
					<input type=\"hidden\" name=\"name\" value=\"".$row['name']."\">
					<input type=\"submit\" value=\"Add to Cart\">
				</form>
			</div>
			";
		}
	}
	else
	{
		$query = "SELECT Products.*, Categories.category_id FROM Products, Categories, Product_Categories WHERE Products.product_id = Product_Categories.product_id AND Categories.category_id = Product_Categories.category_id";
		$result = mysqli_query($cn, $query);
		while ($row = mysqli_fetch_assoc($result))
		{
			if ($row['category_id'] == $filter)
			{
				echo "
				<div class=\"container-produit\">
					<img class=\"img-produit\" src=\"img/".$row['img']."\">
					<div class=\"nom-produit\">".$row['name']."</div>
					<div class=\"description-produit\">".$row['description']."</div>
					<div class=\"price\">".$row['price']."$</div>
					<form class=\"cart-button\" action=\"backend/back_cart.php\" method=\"get\">
						<input type=\"hidden\" name=\"action\" value=\"addproduct\">
						<input type=\"hidden\" name=\"name\" value=\"".$row['name']."\">
						<input type=\"submit\" value=\"Add to Cart\">
					</form>
				</div>
				";				
			}
		}
	}
?>
</body>
</html>
