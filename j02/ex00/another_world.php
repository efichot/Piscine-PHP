#!/usr/bin/php
<?php
	if ($argc == 1) {
		return ;
	}
	$tab = preg_split("/[ \t]+/", $argv[1], 0, PREG_SPLIT_NO_EMPTY);
	echo implode(" ", $tab) . "\n";
?>
