<?php
	include_once('auth.php');
	session_start();
	if ($_POST['login'] !== '' && $_POST['passwd'] !== '' && auth($_POST['login'], $_POST['passwd'])) {
		$_SESSION['loggued_on_user'] = $_POST['login'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Chat</title>
	</head>
	<body>
		<iframe name="chat" src="chat.php" width="100%" height="550px"></iframe>
		<iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
	</body>
</html>
<?php
	} else {
		$_SESSION['loggued_on_user'] = "";
		echo "ERROR\n";
	}
?>
