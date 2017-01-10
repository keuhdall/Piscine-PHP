#!/usr/bin/php
<?php
	function ft_set_tmp_char($str)
	{
		if (strpos($str, "+"))
			return "+";
		elseif (strpos($str, "-"))
			return "-";
		elseif (strpos($str, "*"))
			return "*";
		elseif (strpos($str, "/"))
			return "/";
		elseif (strpos($str, "%"))
			return "%";
		else
			return ".";
	}
	
	function ft_check_sign($str)
	{
		if (!strcmp($str, "+") || !strcmp($str, "-") || !strcmp($str, "*") || !strcmp($str, "/") || !strcmp($str, "%"))
			return true;
		else
			return false;
	}
	
	function ft_parse_line($str)
	{
		$str = trim($str);
		$str = preg_replace('` `', '', $str);
		$sign = ft_set_tmp_char($str);
		if ($sign != ".")
		{
			$tab = explode($sign, $str);
			if (!is_numeric($tab[0]) || (!is_numeric($tab[1])) || count($tab) != 2)
				return false;
			else
				return true;
		}
		else
			return false;
	}

	if ($argc != 2)
		print("Incorrect Parameters\n");
	elseif (!ft_parse_line($argv[1]))
		print("Syntax Error\n");
	else
	{
		$argv[1] = trim($argv[1]);
		$argv[1] = preg_replace('` `', '', $argv[1]);
		$sign = ft_set_tmp_char($argv[1]);
		$tab = explode($sign, $argv[1]);
		if (!strcmp($sign, "+"))
			$result = ($tab[0] + $tab[1]);
		elseif (!strcmp($sign, "-"))
			$result = ($tab[0] - $tab[1]);
		elseif (!strcmp($sign, "*"))
			$result = ($tab[0] * $tab[1]);
		elseif (!strcmp($sign, "/"))
			$result = ($tab[0] / $tab[1]);
		else
			$result = ($tab[0] % $tab[1]);
		print("$result\n");
	}
?>