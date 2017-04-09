<?PHP
	session_start();
	if (file_exists("private/user"))
	{
		$old_data = unserialize(file_get_contents("private/user"));
		if ($old_data) {
			foreach ($old_data as $v)
			{
				if (($_POST['login'] == $v['login']) OR (!$_POST['passwd']) OR (!$_POST['login']))
				{
					echo "ERREUR!\nVEUILLEZ REMPLIR LE FORMULAIRE.";
					return;
				}
			}
		}
	}
	$tmp['login'] = $_POST['login'];
	$tmp['passwd'] = hash("whirlpool", $_POST['passwd']);
	if ($_POST['login'] === "root" && $_POST['passwd'] === "root") {
		$tmp['admin'] = true;
	} else {
		$tmp['admin'] = false;
	}
	$old_data[] = $tmp;
	file_put_contents("private/user", serialize($old_data));
	$_SESSION['loggued_on_user'] = $_POST['login'];
	header("location: categories.php");
?>
