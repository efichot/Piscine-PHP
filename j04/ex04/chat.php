<?php
	date_default_timezone_set('Europe/Paris');
	if (!file_exists('../private/chat')) {
		return;
	}
	$chat = unserialize(file_get_contents('../private/chat'));
	if ($chat) {
			foreach ($chat as $k => $v) {
			$hm = date("H:i", $v['time']);
			echo "[" . $hm . "] <b>" . $v['user'] . "</b>: " . $v['msg'] . "<br />\n";
		}
	}
?>
