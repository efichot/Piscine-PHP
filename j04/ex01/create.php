<?php
	if ($_POST['submit'] !== 'OK' || $_POST['login'] === "" || $_POST['passwd'] === "") {
		echo "ERROR\n";
		return ;
	}
	if (!file_exists("../private")) {
		mkdir("../private");
	}
	if (!file_exists("../private/passwd")) {
		file_put_contents("../private/passwd", null); //create empty file
	}
	$tab = unserialize(file_get_contents("../private/passwd"));
	if ($tab) {
		foreach($tab as $k =>$v) {
			if ($v['login'] === $_POST["login"]) {
				echo "ERROR\n";
				return ;
			}
		}
	}
	$tmp["login"] = $_POST["login"];
	$tmp["passwd"] = hash("whirlpool", $_POST['passwd']);
	$tab[] = $tmp;
	file_put_contents("../private/passwd", serialize($tab));
	echo "OK\n";
?>
