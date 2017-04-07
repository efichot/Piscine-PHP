<?php
	session_start();
	if ($_GET['submit'] === 'OK' && $_GET['login'] !== "" && $_GET['passwd'] !== "") {
		$_SESSION['login'] = $_GET['login'];
		$_SESSION['passwd'] = $_GET['passwd'];
	}
?>
<html><body>
<form method="GET" action="index.php">
	<label for="iden">Identifiant: </label>
	<input id="iden" type="text" name="login" value="<?php echo $_SESSION['login'] ?>"/>
	<br />
	<label for="passwd">Mot de passe: </label>
	<input id="passwd" type="text" name="passwd" value="<?php echo $_SESSION['passwd'] ?>"/>
	<br />
	<input type="submit" name="submit" value="OK"/>
</form>
</body></html>
