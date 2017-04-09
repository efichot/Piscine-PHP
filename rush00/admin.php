<?php
	$pageTitle = "Administration";
	session_start();
	include_once('get_json.php');

	function display_list_admin($tab) {
		foreach ($tab as $product) {
			echo '<ul class="admin-product">';
				echo '<li><span>iD: </span>' . $product['id'] . '</li>';
				echo '<li><span>Name: </span>' . $product['name'] . '</li>';
				echo '<li><span>Brand: </span>' . $product['brand'] . '</li>';
						if ($product['categories']) {
							foreach ($product['categories'] as $categorie) {
							echo '<li>' . ucfirst($categorie) . '&nbsp;&nbsp;</li>';
							}
						}
				echo '<li><span>Price: </span>' . $product['price'] . ' €</li>';
				echo '<li><a href="?action=del?id=' . $product['id'] . '"><i class="fa fa-trash"></i></a></li> <br />';
				echo '<button class="delete" type="submit"><a id="adel" href="admin.php?admin=products&action=del&name=' . $product['name'] . '">Supprimer</a></button>';
			echo '</ul>';
		}
	}

	function del_product($tab, $id) {
		$list['products'] = [];
		foreach ($tab as $product) {
			if ($product['id'] !== $id) {
				$list['products'] = $product;
			}
		}
		print_r($list);
		//$ret = file_put_contents('data/products.json', json_encode($list, true));
		//echo $ret;
	}

	function redirect() {
		header("location: index.php");
	}

	function display_user($data) {
		foreach ($data as $k => $v) {
			echo '<ul class="admin-product">';
				echo '<li><span>User: </span>' . $v['login'] . '</li>';
				if ($v['login'] !== "root") {
					echo '<button class="delete" type="submit"><a id="adel" href="admin.php?admin=user&action=del&name=' . $v['login'] . '">Supprimer</a></button>';
				}
			echo '</ul>';
		}
	}
	if ($_SESSION['loggued_on_user'] === "root") {

?>
<!DOCTYPE html>
<html lang="fr">
	<?php include_once('views/head.php'); ?>
	<body>
		<?php include_once('views/nav.php'); ?>

		<?php include_once('views/admin-nav.php'); ?>

		<?php

			if ($_GET['admin'] === 'user') {
				if ($_GET['action'] === 'del' && file_exists('private/user')) {
					$data = unserialize(file_get_contents('private/user'));
					if ($data) {
						foreach ($data as $k => &$v) {
							if ($_GET['name'] === $v['login'] && $_GET['name'] !== "root") {
								unset($data[$k]);
							}
						}
					}
					file_put_contents('private/user',serialize($data));
				}
				if (file_exists('private/user')) {
					$data = unserialize(file_get_contents('private/user'));
					if ($data) {
						display_user($data);
					}
				} else {
					echo "<h3>Not a single user in Database!</h3>";
				}
			}
			if ($_GET['admin'] === 'products') {
				if ($_GET['action'] === 'del' && file_exists('data/products.json')) {
					$json = file_get_contents('data/products.json');
					$data = json_decode($json,true);
					if ($data) {
						foreach($data as $k => &$v) {
							foreach ($v as $k1 => &$v1) {
								if ($v1['name'] === $_GET['name']) {
									unset($v[$k1]);
								}
							}
						}
						$jsonret = json_encode($data);
						file_put_contents('data/products.json', $jsonret);
					}
				}
				$json = get_json();
				display_list_admin($json['products']);
			}

		?>

		<?php include_once('views/footer.html'); ?>
	</body>
</html>
<?php
} else {
	?>
	<!DOCTYPE html>
	<html lang="fr">
		<?php include_once('views/head.php'); ?>
		<body>
			<?php include_once('views/nav.php'); ?>

			<?php include_once('views/admin-nav.php'); ?>

			<h2 style="text-align:center;">Vous avez besoin d'être un admin pour la partie administration.</h2>

			<?php include_once('views/footer.html'); ?>
		</body>
	</html>
	<?php
}
 ?>
