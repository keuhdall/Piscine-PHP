#!/usr/bin/php
<?php
	$count = 0;
	function ft_split($str)
	{
		$str = trim($str);
		$str = preg_replace('` {2,}`', ' ', $str);
		$str = explode(' ', $str);
		return($str);
	}
	$tab = ft_split($argv[1]);
	foreach ($tab as $elem) {
		if ($count != 0)
			print("$elem ");
		$count++;
	}
	print("$tab[0]\n");
?>