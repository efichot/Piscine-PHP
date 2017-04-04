#!/usr/bin/php
<?php
	if ($argc != 4) {
		echo "Incorrect Parameters\n";
		return ;
	}
	$n1 = trim($argv[1], " \t");
	$n2 = trim($argv[3], " \t");
	$s = trim($argv[2], " \t");
	if ($s === "+") {
		echo $n1 + $n2 . "\n";
	}
	if ($s === "-") {
		echo $n1 - $n2 . "\n";
	}
	if ($s === "*") {
		echo $n1 * $n2 . "\n";
	}
	if ($s === "/") {
		echo $n1 / $n2 . "\n";
	}
	if ($s === "%") {
		echo $n1 % $n2 . "\n";
	}
?>
