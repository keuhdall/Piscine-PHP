#!/usr/bin/php
<?php
	$str = trim($argv[1]);
	$str = preg_replace('` {2,}`', ' ', $str);
	print("$str\n");
?>