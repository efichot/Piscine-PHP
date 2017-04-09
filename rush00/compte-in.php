<?php
	$pageTitle = "Login";
	session_start();

	if (!$_POST['oldpwd'] OR !$_POST['newpwd'] OR !$_POST['login'])
	{
		echo "VEUILLEZ REMPLIR TOUS LES CHAMPS\n";
		return;
	}
	$database = unserialize(file_get_contents("private/user"));
	$hash_oldpwd = hash("whirlpool", $_POST['oldpwd']);
	$hash_newpwd = hash("whirlpool", $_POST['newpwd']);
	$i = 0;
	if ($_POST['login'] === "root") {
	?>

	<!DOCTYPE html>
	<html lang="fr">
		<?php include_once('views/head.php'); ?>
		<body>
			<?php include_once('views/nav.php'); ?>

			<h2 style='text-align:center;'>Vous ne pouvez modifier le root.</h2>

			<?php include_once('views/footer.html'); ?>
		</body>
	</html>

	<?php
		return;
	}
	foreach ($database as $k => &$user)
	{
		if (($_POST['login'] == $user['login']) AND ($hash_oldpwd != $user['passwd']))
		{
			?>

			<!DOCTYPE html>
			<html lang="fr">
				<?php include_once('views/head.php'); ?>
				<body>
					<?php include_once('views/nav.php'); ?>

					<h2 style='text-align:center;'>Votre ancien mot de passe et erroné!</h2>

					<?php include_once('views/footer.html'); ?>
				</body>
			</html>

			<?php
			return;
		}
		if (($_POST['login'] == $user['login']) AND ($hash_oldpwd == $user['passwd']))
		{
			$i = 1;
			$database[$k]['passwd'] = $hash_newpwd;
		}
	}
	file_put_contents("private/user", serialize($database));
	if ($i == 0)
	{
		?>

		<!DOCTYPE html>
		<html lang="fr">
			<?php include_once('views/head.php'); ?>
			<body>
				<?php include_once('views/nav.php'); ?>

				<h2 style='text-align:center;'>Vous ne correspondez pas à un utilisateur connu.</h2>

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

			<h2 style='text-align:center;'>Mot de passe modifié.</h2>

			<?php include_once('views/footer.html'); ?>
		</body>
	</html>
<?php
}
 ?>
