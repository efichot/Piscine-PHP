#!/usr/bin/php
<?php
	$fd = fopen("php://stdin", "r");
	while ($fd && !feof($fd)) {
		echo "Entrez un nombre: ";
		$number = fgets($fd);
		if ($number) {
			$number = str_replace("\n", "", $number);
			if (is_numeric($number)) {
				if ($number % 2 == 0) {
					echo "Le chiffre $number est Pair\n";
				} else {
					echo "Le chiffre $number est Impair\n";
				}
			} else {
				echo "'$number' n'est pas un chiffre\n";
			}
		}
	}
	fclose($fd);
	echo "\n";
?>
