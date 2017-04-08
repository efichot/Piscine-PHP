<?php
	if (!file_exists('data/products.json')) {
		$data = file_get_contents('data/api.json');
		if (!file_put_contents('data/products.json', $data)) {
			echo "IMPOSSIBLE DE RECUPERER LA DATA, PROBLEME AVEC L'API";
		}
	}
?>
