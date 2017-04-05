#!/usr/bin/php
<?php
	function dayOfWeek(&$tabg, $s) {
		if (strtolower($s) != "lundi" && strtolower($s) != "mardi" && strtolower($s) != "mercredi" && strtolower($s) != "jeudi"
		&& strtolower($s) != "vendredi" && strtolower($s) != "samedi" && strtolower($s) != "dimanche") {
			return false;
		}
		return true;
	}

	function dayOfMonth(&$tabg, $s) {
		if ((strlen($s) != 1 && strlen($s) != 2) || !ctype_digit($s)) {
			return false;
		}
		$tabg[] = intval($s);
		return true;
	}

	function month(&$tabg, $s) {
		switch(strtolower($s)) {
			case "janvier":
				$tabg[] = 1;
				return true;
			case "fevrier":
				$tabg[] = 2;
				return true;
			case "mars":
				$tabg[] = 3;
				return true;
			case "avril":
				$tabg[] = 4;
				return true;
			case "mai":
				$tabg[] = 5;
				return true;
			case "juin":
				$tabg[] = 6;
				return true;
			case "juillet":
				$tabg[] = 7;
				return true;
			case "aout":
				$tabg[] = 8;
				return true;
			case "septembre":
				$tabg[] = 9;
				return true;
			case "octobre":
				$tabg[] = 10;
				return true;
			case "novembre":
				$tabg[] = 11;
				return true;
			case "decembre":
				$tabg[] = 12;
				return true;
			default:
				return false;
		}
	}

	function year(&$tabg, $s) {
		if (strlen($s) != 4 || intval($s) <= 1969) {
			return false;
		}
		$tabg[] = intval($s);
		return true;
	}

	function hms(&$tabg, $s) {
		$tab = explode(":", $s);
		if (count($tab) != 3 || intval($tab[0]) >= 24 || intval($tab[1]) >= 60 || intval($tab[2]) >= 60) {
			return false;
		}
		foreach ($tab as $v) {
			if (strlen($v) != 2) {
				return false;
			}
		}
		$tabg[] = intval($tab[0]);
		$tabg[] = intval($tab[1]);
		$tabg[] = intval($tab[2]);
		return true;
	}

	if ($argc == 1) {
		exit();
	}
	$tabg = [];
	$tab = explode(" ", $argv[1]);
	if (count($tab) != 5 || !dayOfWeek($tabg, $tab[0]) || !dayOfMonth($tabg, $tab[1]) || !month($tabg, $tab[2]) || !year($tabg, $tab[3]) || !hms($tabg, $tab[4])) {
		echo "Wrong Format\n";
		exit();
	}
	date_default_timezone_set("Europe/Paris");
	$tab[0] = strtolower($tab[0]);
	$dayWeek = ["lundi" => "Monday", "mardi" => "Tuesday", "mercredi" => "Wednesday", "jeudi" => "Thursday", "vendredi" => "Friday", "samedi" => "Saturday", "dimanche" => "Sunday"];
	$dayReal = date("l", mktime($tabg[3], $tabg[4], $tabg[5], $tabg[1], $tabg[0], $tabg[2]));
	if ($dayWeek[$tab[0]] !== $dayReal) {
		echo "Wrong Format\n";
		exit();
	}
	echo mktime($tabg[3], $tabg[4], $tabg[5], $tabg[1], $tabg[0], $tabg[2]) . "\n";
