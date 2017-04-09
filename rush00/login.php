<?php
	$pageTitle = "Login";
	include_once('auth.php');
	session_start();
	if ($_POST['login'] !== '' && $_POST['passwd'] !== '' && auth($_POST['login'], $_POST['passwd'])) {
		$_SESSION['loggued_on_user'] = $_POST['login'];
		header("Location: categories.php");
	} else {
		$_SESSION['loggued_on_user'] = "";
		echo "ERROR\n";
	}
?>
