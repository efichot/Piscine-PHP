#!/usr/bin/php
<?php
	if ($argc == 1) {
		return;
	}
	unset($argv[0]);
	$tab = [];
	foreach ($argv as $k => $v) {
		$tab1 = array_filter(explode(" ", $v));
		foreach ($tab1 as $k2 => $v2) {
			$tab[] = $v2;
		}
	}
	sort($tab);
	echo implode("\n", $tab) . "\n";
?>
