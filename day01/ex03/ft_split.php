<?php
	function ft_split($str)
	{
		$str = trim($str);
		$str = preg_replace('` {2,}`', ' ', $str);
		$str = explode(' ', $str);
		sort($str);
		return($str);
	}
?>