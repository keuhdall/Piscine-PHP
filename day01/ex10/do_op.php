#!/usr/bin/php
<?php
	function ft_check_sign($param)
	{
		if (!strcmp($param, "+") || !strcmp($param, "-") || !strcmp($param, "*") || !strcmp($param, "/") || !strcmp($param, "%"))
			return true;
		else
			return false;
	}
	if ($argc != 4 || !ft_check_sign(trim($argv[2])) || !is_numeric(trim($argv[1])) || !is_numeric(trim($argv[3])))
		print("Inconrrect Parameters\n");
	else
	{
		$argv[1] = trim($argv[1]);
		$argv[2] = trim($argv[2]);
		$argv[3] = trim($argv[3]);
		if (!strcmp($argv[2], "+"))
			$result = ($argv[1] + $argv[3]);
		elseif (!strcmp($argv[2], "-"))
			$result = ($argv[1] - $argv[3]);
		elseif (!strcmp($argv[2], "*"))
			$result = ($argv[1] * $argv[3]);
		elseif (!strcmp($argv[2], "/"))
			$result = ($argv[1] / $argv[3]);
		else
			$result = ($argv[1] % $argv[3]);
		print("$result\n");
	}
?>