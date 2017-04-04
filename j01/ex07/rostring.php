#!/usr/bin/php
<?php
	if ($argc == 1) {
		return ;
	}
	$tab = array_filter(explode(" ", $argv[1]));
	for ($i=1; $i < count($tab); $i++) {
		echo $tab[$i] . " ";
	}
	echo $tab[0] . "\n";
?>
