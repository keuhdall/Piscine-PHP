#!/usr/bin/php
<?php
	$argv[1] = trim($argv[1]);
	$argv[1] = preg_replace('`\t`', ' ', $argv[1]);
	$argv[1] = preg_replace('` {2,}`', ' ', $argv[1]);
	printf("$argv[1]\n");
?>