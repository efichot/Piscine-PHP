<?php
	if (file_exists('list.csv')) {
		$file = file('list.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		foreach ($file as $k => $line) {
			$tmp = explode(';', $line);
			$tab[$tmp[0]] = [$tmp[1]];
		}
		echo json_encode($tab);
	}
?>
