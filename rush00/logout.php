<?php
	session_start();
	$_SESSION['logged_on_user'] = '';
?>
<!DOCTYPE html>
<html>
	<?php include_once('template/head.php'); ?>
	<body>
		<?php include_once('template/nav.php'); ?>
		<h3>Merci beaucoup et à la prochaine!</h3>
		<?php include_once('template/footer.php'); ?>
	</body>
</html>
