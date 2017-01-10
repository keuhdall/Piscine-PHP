#!/usr/bin/php
<?php
	unset($argv[0]);
	$tab_num = array();
	$tab_string = array();
	$tab_other = array();
	foreach ($argv as $str) {
		$str = trim($str);
		$str = preg_replace('` {2,}`', ' ', $str);
		$tab = explode(' ', $str);
		foreach ($tab as $elem) {
			if (is_numeric($elem))
				array_push($tab_num, $elem);
			elseif (ctype_alpha($elem))
				array_push($tab_string, $elem);
			else
				array_push($tab_other, $elem);
		}
	}
	natcasesort($tab_string);
	sort($tab_num, SORT_STRING);
	sort($tab_other);
	foreach ($tab_string as $elem1) {
		print("$elem1\n");
	}
	foreach ($tab_num as $elem2) {
		print("$elem2\n");
	}
	foreach ($tab_other as $elem3) {
		print("$elem3\n");
	}
?>