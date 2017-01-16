<?php
    session_start();
?>
<ul class="navbar">
  <li class="dropdown">
    <a href="product_display.php?category=all" class="dropbtn">Browse Products</a>
    <div class="dropdown-content">
	<?php
		$cn = mysqli_connect('localhost', 'root', 'root');
		if (mysqli_connect_errno()) {
		  die("Database connection failed".mysqli_connect_error());
		}
		mysqli_select_db($cn, 'my_database');
		$query = "SELECT * FROM Categories";
		$result = mysqli_query($cn, $query);
		while ($row = mysqli_fetch_assoc($result))
		{
			echo "<a href=\"product_display.php?category=".$row['category_id']."\">".$row['name']." Memes</a>";
		}
	?>
    </div>
  </li>
  <li><a href="about.php">About Us</a></li>
  <?php

    function ft_check_admin($username)
    {
      $cn = mysqli_connect('localhost', 'root', 'root');
      if (mysqli_connect_errno()) {
        die("Database connection failed".mysqli_connect_error());
      }
      mysqli_select_db($cn, 'my_database');
      $query = "SELECT login, isAdmin FROM Users";
      $result = mysqli_query($cn, $query);
      while ($row = mysqli_fetch_assoc($result))
      {
        if ($row['login'] === $username &&
          $row['isAdmin'] === "1")
          return true;
      }
      return false;
    }
    if (!$_SESSION['username'])
    {
      echo "
        <li style=\"float:right\"><a href=\"signup.php\">Sign Up</a></li>
        <li style=\"float:right\"><a href=\"login.php\">Sign In</a></li>
        <li style=\"float:right\"><a href=\"cart_display.php\">My Cart</a></li>";
    }
    else
    {
      echo "
      <li style=\"float:right\"><a href=\"user_info.php\">Welcome ".$_SESSION['username']."</a></li>
      <li style=\"float:right\"><a href=\"logout.php\">Logout</a></li>
      <li style=\"float:right\"><a href=\"cart_display.php\">My Cart</a></li>";
      if (ft_check_admin($_SESSION['username']))
        echo "<li style=\"float:right\"><a href=\"admin_tools.php\">Admin</a></li>";
    }
  ?>
</ul>

<h1 style="text-align:center"><a href="index.php">MEMESHOP</a></h1>
