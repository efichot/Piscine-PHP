<?php
	$datajson = file_get_contents('data/api.json');
	file_put_contents('data/products.json', $datajson);
?>
