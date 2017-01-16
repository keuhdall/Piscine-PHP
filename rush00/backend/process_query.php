<?php

$cn = mysqli_connect('localhost', 'root', 'root');
if (mysqli_connect_errno()) {
	die("Database connection failed".mysqli_connect_error());
}
mysqli_select_db($cn, 'my_database');

mysqli_query($cn, $_POST['query']);

// echo $_POST['query'];

header("Location:".$_SERVER['HTTP_REFERER'], true, 302);

?>
