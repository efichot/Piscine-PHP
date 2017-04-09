<?php
	$pageTitle = "Login";
	include_once('auth.php');
	session_start();
	if ($_POST['login'] !== '' && $_POST['passwd'] !== '' && auth($_POST['login'], $_POST['passwd'])) {
		$_SESSION['loggued_on_user'] = $_POST['login'];
		header("Location: categories.php");
	} else {
		$_SESSION['loggued_on_user'] = "";
		?>

		<!DOCTYPE html>
		<html lang="fr">
			<?php include_once('views/head.php'); ?>
			<body>
				<?php include_once('views/nav.php'); ?>

					<h2 style="text-align:center;"> Votre compte n'existe pas encore, enregistre toi.</h2>


				<?php include_once('views/footer.html'); ?>
			</body>
		</html>



		<?php
	}
?>
