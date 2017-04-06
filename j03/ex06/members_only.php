<?php
	if ($_SERVER['PHP_AUTH_USER'] === "zaz" && $_SERVER['PHP_AUTH_PW'] === "jaimelespetitsponeys") {
		$str = file_get_contents("../img/42.png");
		$encode = base64_encode($str);
		echo "<html><body>
Bonjour Zaz<br />
<img src='data:image/png;base64,$encode'>
</body></html>\n";
	} else {
		header("HTTP/1.0 401 Unauthorized");
		header("WWW-Authenticate: Basic realm=''Espace membres''");
		echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n";
	}
?>
