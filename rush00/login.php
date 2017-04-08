<?php
	$pageTitle = "login";
?>

<!DOCTYPE html>
<html lang="fr">
	<?php include_once('template/head.php'); ?>
	<body>
		<?php include_once('template/nav.php'); ?>
			<form method="post" action="login.php">
				<label for="login">Login</label>
				<input id="login" type="text" name="login" value="" placeholder="Login" required>

				<label for="password">Password</label>
				<input id="password" type="password" name="password" value="" placeholder="password" required>

				<button type="submit" name="button">Se connecter</button>
			</form>
		<?php include_once('template/footer.php'); ?>
	</body>
</html>
