<?php
	$pageTitle = "Panier";
	session_start();
	function already_exists($panier, $name) {
		//print_r($panier);
		//echo count($panier);
		for ($i=0; $i < count($panier); $i++) {
			if ($panier[$i]['name'] === $name) {
				return true;
			}
		}
		return false;
	}

	function notExistindb($data, $name) {
		$i = 0;
		foreach ($data as $k => $v) {
			foreach ($v as $k2 => $v2) {
				if ($v2['name'] === $name) {
					$i = 1;
				}
			}
		}
		return ($i === 1) ? true : false;
	}

	function display_list_admin($tab) {
		foreach ($tab as $product) {
			echo '<ul class="admin-product">';
				echo '<li><span>iD: </span>' . $product['id'] . '</li>';
				echo '<li><span>Name: </span>' . $product['name'] . '</li>';
				echo '<li><span>Brand: </span>' . $product['brand'] . '</li>';
				if ($products['categories']) {
					foreach ($product['categories'] as $categorie) {
						echo '<li>' . ucfirst($categorie) . '&nbsp;&nbsp;</li>';
					}
				}
				echo '<li><span>Price: </span>' . $product['price'] . ' €</li>';
				echo '<li><a href="?action=del?id=' . $product['id'] . '"><i class="fa fa-trash"></i></a></li> <br />';
				echo '<button class="delete" type="submit"><a id="adel" href="panier.php?del=' . $product['name'] . '">Supprimer</a></button>';
			echo '</ul>';
		}
	}
if ($_GET['name']) {

	$json = file_get_contents('data/products.json');
	$data = json_decode($json,true);
	if ($data) {
		foreach($data as $k => &$v) {
			foreach ($v as $k1 => &$v1) {
				if ($v1['name'] === $_GET['name']) {
					$tab = $data[$k][$k1];
				}
			}
		}

		if (!file_exists('private/panier')) {
			$panier[] = $tab;
			file_put_contents('private/panier', serialize($panier));
		} else {
			$panier = unserialize(file_get_contents('private/panier'));
			if (already_exists($panier, $_GET['name'])) {
				echo "<h2 id='already'>Vous avez déjà le chat " . $_GET['name'] . "</h2>";
			} else {
				if (notExistIndb($data, $_GET['name'])) {
					$panier[] = $tab;
					file_put_contents('private/panier',serialize($panier));
				}
			}
		}
}
}
if ($_GET['del']) {
	$panier = unserialize(file_get_contents('private/panier'));
	foreach ($panier as $k => &$v) {
		if ($v['name'] === $_GET['del']) {
			unset($panier[$k]);
		}
	}
	file_put_contents('private/panier',serialize($panier));
}
 ?>
 <!DOCTYPE html>
 <html lang="fr">
 	<?php include_once('views/head.php'); ?>
 	<body>
 		<?php include_once('views/nav.php'); ?>

 		<h2 style="text-align:center;">Votre Panier:</h2>

		<?php
			$panier = unserialize(file_get_contents('private/panier'));
			if ($panier) {
				display_list_admin($panier);
			}
			echo "<button id='butpan' type='submit'><a id='apan' href='thx.php'>Valider le panier</a></button>";
		 ?>

 		<?php include_once('views/footer.html'); ?>
 	</body>
 </html>
