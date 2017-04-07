<?php
if (!$_POST['login'] === "" || $_POST['oldpw'] === "" || $_POST['newpw'] === "" || $_POST['submit'] !== 'OK') {
		echo "ERROR\n";
		return ;
	}
	if (!file_exists('../private/passwd')) {
		echo "ERROR\n"
		return;
	}
	$tab = unserialize(file_get_contents('../private/passwd'));
	if ($tab) {
		foreach ($tab as $k => $v) {
			if ($v['login'] === $_POST['login'] && $v['passwd'] === hash('whirlpool', $_POST['oldpw'])) {
				$tab[$k]['passwd'] = hash('whirlpool', $_POST['newpw']);
				file_put_contents('../private/passwd', serialize($tab));
				header("Location: index.html");
				echo "OK\n";
				return;
			}
		}
	}
	echo "ERROR\n";
?>
