<?php
	function auth($login, $passwd) {
		if ($login === "" || $passwd === "") {
			return FALSE;
		}
		if (!file_exists('private/user')) {
			return ;
		}
		$tab = unserialize(file_get_contents('private/user'));
		if ($tab) {
			foreach ($tab as $k => $v) {
				if ($login === $v['login'] && hash("whirlpool", $passwd) === $v['passwd']) {
					return TRUE;
				}
			}
		}
		return FALSE;
	}
?>
