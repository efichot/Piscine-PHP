<?php
	session_start();
 ?>

<!DOCTYPE html>
<html lang="fr">
	<?php include_once('views/head.php'); ?>
	<body>
		<?php include_once('views/nav.php'); ?>

			<form method="post" action="compte-in.php">

				<label for="login">Login</label>
				<input id="login" type="text" name="login" value="" placeholder="Login" required>

				<label for="password">Ancien password</label>
				<input id="password" type="oldpwd" name="oldpwd" value="" placeholder="oldpwd" required>

				<label for="password">Nouveau password</label>
				<input id="password" type="newpwd" name="newpwd" value="" placeholder="newpwd" required>

				<button type="submit" name="button">Modifier</button>

			</form>

		<?php include_once('views/footer.html'); ?>
	</body>
</html>
