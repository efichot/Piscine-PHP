#!/usr/bin/php
<?php
	if ($argc != 2) {
		exit();
	}
	$str = file_get_contents($argv[1]);
	$rep = preg_replace_callback("/<a.*?>.*?<\/a>/s", function ($match) {

		$match[0] = preg_replace_callback("/(title=\")(.*?)(\")/s", function ($match) {
			$match[2] = strtoupper($match[2]);
			return $match[1] . $match[2] . $match[3];
		}, $match[0]);

		$match[0] = preg_replace_callback("/(>)(.*?)(<)/s", function ($match) {
			$match[2] = strtoupper($match[2]);
			return $match[1] . $match[2] . $match[3];
		}, $match[0]);

		return $match[0];
	}, $str);
	echo $rep;
?>
