#!/usr/bin/php
<?php
	if ($argc != 2) {
		echo "Incorrect Parameters\n";
		return ;
	}
	$calcule = str_replace(" ", "", $argv[1]);
	$n1 = intval($calcule);
	$s = substr($calcule, strlen($n1), 1);
	$n2 = intval(substr($calcule, strlen($n1) + 1, strlen($calcule)));
	if (!is_numeric($n1) || !is_numeric($n2)) {
		echo "Syntax Error\n";
		return ;
	}
	if ($s === "+") {
		echo $n1 + $n2 . "\n";
		return ;
	}
	if ($s === "-") {
		echo $n1 - $n2 . "\n";
		return ;
	}
	if ($s === "*") {
		echo $n1 * $n2 . "\n";
		return ;
	}
	if ($s === "/") {
		echo $n1 / $n2 . "\n";
		return ;
	}
	if ($s === "%") {
		echo $n1 % $n2 . "\n";
		return ;
	}
	echo "Syntax Error\n";
?>
