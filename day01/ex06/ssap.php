#!/usr/bin/php
<?php
	unset($argv[0]);
	sort($argv);
	foreach ($argv as $str) {
		$str = trim($str);
		$str = preg_replace('` {2,}`', ' ', $str);
		$tab = explode(' ', $str);
		foreach ($tab as $elem) {
			print("$elem\n");
		}
	}
?>