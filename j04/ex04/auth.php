<?php
	function auth($login, $passwd) {
		if ($login === "" || $passwd === "") {
			return FALSE;
		}
		if (!file_exists('../private/passwd')) {
			return ;
		}
		$tab = unserialize(file_get_contents('../private/passwd'));
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
