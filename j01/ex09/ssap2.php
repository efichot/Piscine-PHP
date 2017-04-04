#!/usr/bin/php
<?php
	function is_sort($a, $b) {
		$a = strtolower($a);
		$b = strtolower($b);
		$sort = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
		$length = strlen($a) < strlen($b) ? strlen($a) : strlen($b);
		for ($i = 0; $i < $length; $i++)
		{
			$aa = $a[$i];
			$bb = $b[$i];
			$ia = array_search($aa, $sort);
			$ib = array_search($bb, $sort);
			$ia = $ia === false ? ord($aa) + 100 : $ia;
			$ib = $ib === false ? ord($bb) + 100 : $ib;
			if ($ib < $ia)
				return false;
			if ($ib > $ia)
				return true;
		}
		return strlen($a) <= strlen($b) ? true : false;
	}

	if ($argc == 1) {
		return ;
	}
	$tab = [];
	unset($argv[0]);
	foreach ($argv as $k => $v) {
		$tab1 = array_filter(explode(" ", $v));
		foreach ($tab1 as $k2 => $v2) {
			$tab[] = $v2;
		}
	}
	for ($i=0; $i < count($tab) - 1;) {
		if (is_sort($tab[$i], $tab[$i + 1])) {
			$i++;
		} else {
			$tmp = $tab[$i];
			$tab[$i] = $tab[$i + 1];
			$tab[$i + 1] = $tmp;
			$i = 0;
		}
	}
	foreach ($tab as $v) {
		echo $v . "\n";
	}
?>
