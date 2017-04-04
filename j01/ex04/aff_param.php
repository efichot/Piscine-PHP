#!/usr/bin/php
<?php
	if ($argc <= 1) {
		return ;
	}
	unset($argv[0]);
	foreach ($argv as $k => $v) {
		echo $v . "\n";
	}
?>
