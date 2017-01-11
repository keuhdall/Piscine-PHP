#!/usr/bin/php
<?php
	if ($argc != 2)
		return ;
	$result = file_get_contents($argv[1]);
	$result = preg_replace_callback('/<a href.*title="(.+?)".*>/',
	function ($match) {
		$tab = explode("\"".$match[1]."\"", $match[0]);
		$match[1] = strtoupper($match[1]);
		return $tab[0]."\"".$match[1]."\"".$tab[1];
	}, $result);
	$result = preg_replace_callback('/<a href.*>(.+?)</',
	function ($match) {
		$tab = explode($match[1], $match[0]);
		$match[1] = strtoupper($match[1]);
		return $tab[0].$match[1].$tab[1];
	}, $result);
	print($result);
?>