<nav>
	<ul class="menu">
		<li class="<?php echo ($pageTitle === "home" ? 'active' : '') ?>"><a href="index.php">ACCUEIL</a></li>
		<li class="<?php echo ($pageTitle === "categories" ? 'active' : '') ?>"><a href="categories.php">CATEGORIES</a></li>
		<li class="<?php echo ($pageTitle === "articles" ? 'active' : '') ?>"><a href="articles.php">ARTICLES</a></li>
		<li class="<?php echo ($pageTitle === "basket" ? 'active' : '') ?>"><a href="basket.php">PANIER</a></li>
		<li class="<?php echo ($pageTitle === "login" ? 'active' : '') ?>"><a href="login.php">CONNECTION</a></li>
		<li class="<?php echo ($pageTitle === "logout" ? 'active' : '') ?>"><a href="logout.php">DECONNECTION</a></li>
	</ul>
</nav>
