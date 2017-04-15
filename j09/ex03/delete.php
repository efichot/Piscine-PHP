<?php
	$list = '';
	//echo $_GET['id'];
	if (file_exists('list.csv') && isset($_GET['id'])) {
		$file = file('list.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		foreach($file as $k => $line) {
			$tmp = explode(';', $line);
			if ($_GET['id'] != $tmp[0]) {
				$list .= $tmp[0] . ';' . $tmp[1] . PHP_EOL;
			}
		}
		file_put_contents('list.csv', $list);
	}
 ?>
