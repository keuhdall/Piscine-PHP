<?php
	function ft_fill_db()
	{
		global $cn;

		$name = array("Pepe", "Y tho", "YOLO", "Poker Face", "Marx", "Putin", "Harambe", "Bee Movie");
		$description = array("REEEEEEEEEEE----", "y?", "But you can get TIGd twice.", "2010 wants its memes back.", "Seize the memes of production", "Cyka blyat", "Put your d**ks out",
							"According to all known laws of aviation, there is no way a bee
							should be able to fly. Its wings are too small to get
							its fat little body off the ground.");

		$img = array("pepe.jpg", "ytho.jpg", "yolo.jpg", "pokerface.png", "marx.jpeg", "putin.jpg", "harambe.jpg", "bee.png");
		$price = array(2017, 1932, 1, 50, 0, 99999999, 2016, 172);
		$count = 0;
		while ($count < count($name))
		{
			$query = "INSERT INTO Products (name, description, img, price)
			VALUES ('".$name[$count]."', '".$description[$count]."', '".$img[$count]."', '".$price[$count]."')";
			mysqli_query($cn, $query);
			$count++;
		}
		mysqli_query($cn, "INSERT INTO Users (login, password, email, isAdmin) VALUES ('root', '06948d93cd1e0855ea37e75ad516a250d2d0772890b073808d831c438509190162c0d890b17001361820cffc30d50f010c387e9df943065aa8f4e92e63ff060c', 'root@memeshop.com', 1)");
		$category_name = array("Dank", "Forced", "Zesty");
		$count = 0;
		while ($count < count($category_name))
		{
			$query = "INSERT INTO Categories (name) VALUES ('".$category_name[$count]."')";
			mysqli_query($cn, $query);
			$count++;
		}
		$query = "INSERT INTO Product_Categories (product_id, category_id) VALUES (1, 1), (2, 1), (3, 2), (4, 2), (5, 3), (6, 1),
		(6, 2), (6, 3), (7, 1), (7, 2), (8, 1)";
		mysqli_query($cn, $query);
	}

	function ft_create_db()
	{
		global $cn;
		$query = "CREATE DATABASE my_database";
		if (!mysqli_query($cn, $query))
		    echo "Error creating database\n";
		mysqli_select_db($cn, "my_database");

		$query = "CREATE TABLE Users (
			user_id INT(8) NOT NULL AUTO_INCREMENT,
			login VARCHAR(30) NOT NULL,
			password VARCHAR(150) NOT NULL,
			email VARCHAR (80) NOT NULL,
			isAdmin BOOLEAN,
			PRIMARY KEY  (user_id)
		)";
		if (!mysqli_query($cn, $query))
		    echo "Error creating table : ". mysqli_error($conn)."\n";

		$query = "CREATE TABLE Products (
			product_id INT(8) NOT NULL AUTO_INCREMENT,
			name VARCHAR(30) NOT NULL,
			description VARCHAR(500),
			img VARCHAR(100) NOT NULL,
			price INT,
			PRIMARY KEY  (product_id)
		)";
		if (!mysqli_query($cn, $query))
		    echo "Error creating table\n";

		$query = "CREATE TABLE Categories (
			category_id INT(8) NOT NULL AUTO_INCREMENT,
			name VARCHAR(30) NOT NULL,
			PRIMARY KEY  (category_id)
		)";
		if (!mysqli_query($cn, $query))
			echo "Error creating table\n";

		$query = "CREATE TABLE Product_Categories (
			product_id INT(8) NOT NULL,
			category_id INT(8) NOT NULL,
			PRIMARY KEY  (product_id, category_id)
		)";
		if (!mysqli_query($cn, $query))
			echo "Error creating table\n";

		$query = "CREATE TABLE Cart (
			login VARCHAR(30) NOT NULL,
			cart  VARCHAR (200)
		)";
		if (!mysqli_query($cn, $query))
		    echo "Error creating table cart.";

		$query = "CREATE TABLE Orders (
			login VARCHAR(30) NOT NULL,
			cart  VARCHAR (200)
		)";
		if (!mysqli_query($cn, $query))
			echo "Error creating table orders";
	}
	$cn = mysqli_connect('localhost', 'root', 'root');
	if (mysqli_connect_errno()) {
		die("Database connection failed".mysqli_connect_error());
	}
	if (!mysqli_select_db($cn, 'my_database'))
	{
		ft_create_db();
		ft_fill_db();
	}
	mysqli_close($cn);
?>
