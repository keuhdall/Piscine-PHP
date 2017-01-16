<?php
session_start();
if ($_SESSION['admin'] != 1) {
	header('HTTP/1.0 403 Forbidden');
	exit();
}
include("backend/navbar.php");
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Memeshop, worldwide meme provider since 2017</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/navbar.css">
	<link rel="stylesheet" href="css/tools.css">
	<link rel="stylesheet" href="css/db.css">
</head>
<body>

<div class="table-selector">
	<p>Select Table</p>
	<form action="admin_tools.php" method="get">
		<select name="table" size="1">
			<?php
				$cn = mysqli_connect('localhost', 'root', 'root');
				mysqli_select_db($cn, 'my_database');
				$query = "SHOW TABLES";
				$result = mysqli_query($cn, $query);
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<option>".$row['Tables_in_my_database'];
				}
			?>
		</select>
		<input class="submit" name="submit" type="submit" value="OK">
	</form>
</div>

<?
	if ($_GET['table']) {
		$cn = mysqli_connect('localhost', 'root', 'root');
		if (mysqli_connect_errno()) {
			die("Database connection failed".mysqli_connect_error());
		}
		mysqli_select_db($cn, 'my_database');

		echo "<table>";
		//Tab headers
		echo "<tr>";
		$query = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='".$_GET['table']."'";
		$result = mysqli_query($cn, $query);
		while ($row = mysqli_fetch_array($result)) {
			echo "<th>".$row[0]." </th>";
		}
		echo "</tr>";

		// Tab contents
		$query = "SELECT * FROM ".$_GET['table'];
		$result = mysqli_query($cn, $query);
		while ($row = mysqli_fetch_assoc($result))
		{
			echo "<tr>";
			foreach ($row as $value) {
				echo "<td>".$value."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}
?>
<hr>
<div class="sql">
	<p>Insert SQL Query here.</p>
	<form action="backend/process_query.php" method="POST">
		<input id="sql-field" type="text" name="query">
		<input id="sql-button" name="qbutton" type="submit" value="OK">
	</form>
</div>

</body>
</html>
