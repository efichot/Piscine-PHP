<?php
	session_start();
	if ($_SESSION['loggued_on_user'] !== "") {
		file_put_contents('private/panier', "a:0:{}");
 ?>
<!DOCTYPE html>
<html lang="fr">
	<?php include_once('views/head.php'); ?>
	<body>
		<?php include_once('views/nav.php'); ?>

		<h2 style='text-align:center;'>Merci, beaucoup pour votre commande! À bientôt.</h2>

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

			<h2 style='text-align:center;'>Vous devez être enregistré pour commander, merci de vous inscrire.</h2>

			<?php include_once('views/footer.html'); ?>
		</body>
	</html>
	<?php
}
 ?>
