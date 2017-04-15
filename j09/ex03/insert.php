<?php
	$id = 0;
	if (file_exists('list.csv') && isset($_GET['todo']) && !empty($_GET['todo'])) {
		$tab = file('list.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		foreach ($tab as $k => $line) {
			$tmp = explode(';', $line);
			$id = $tmp[0] + 1;
		}
		file_put_contents('list.csv', $id . ';' . $_GET['todo'] . PHP_EOL, FILE_APPEND);
	}
?>
