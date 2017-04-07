<?php
	session_start();
	if ($_SESSION['loggued_on_user'] === "") {
		echo "ERROR\n";
		return;
	}
	if (!file_exists('../private/chat')) {
		file_put_contents('../private/chat', null);
	}
	$chat = unserialize(file_get_contents('../private/chat'));
	$fd = fopen('../private/chat', 'r+');
	flock($fd, LOCK_EX);
	$tmp['login'] = $_SESSION['loggued_on_user'];
	$tmp['time'] = time();
	$tmp['msg'] = $_POST['msg'];
	$chat[] = $tmp;
	file_put_contents('../private/chat', serialize($chat));
	fclose($fd);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Speak</title>
		<script langage="javascript">top.frames['chat'].location = 'chat.php';</script>
	</head>
	<body>
		<form method="POST" action="speak.php">
			<input style="width:50%" type="text" name="msg" placeholder="Tape ton message ici!" />
			<input type="submit" name="submit" value="Envoyer" />
		</form>
	</body>
</html>
