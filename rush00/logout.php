<?PHP
	file_put_contents('private/panier', "a:0:{}");
	session_start();
	$_SESSION['loggued_on_user'] = "";
	header("location: index.php");
?>
