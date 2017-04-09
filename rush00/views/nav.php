

<nav>
	<ul class="menu">
		<li  class="<?php echo ($pageTitle === 'Accueil' ? 'active' : ''); ?>"><a href="index.php"><i class="fa fa-home"></i> ACCUEIL</a></li>
		<li class="<?php echo ($pageTitle === 'Products' ? 'active' : ''); ?>"><a href="categories.php"><i class="fa fa-tags"></i> CATEGORIES</a></li>
		<li class="<?php echo ($pageTitle === 'Suggest' ? 'active' : ''); ?>"><a href="suggest.php"><i class="fa fa-user"></i> SUGGESTION</a></li>
		<li class="<?php echo ($pageTitle === 'Panier' ? 'active' : ''); ?>"><a href="panier.php"><i class="fa fa-shopping-cart"></i> PANIER</a></li>
		<li class="<?php echo ($pageTitle === 'Administration' ? 'active' : ''); ?>"><a href="admin.php"><i class="fa fa-cog"></i> ADMINISTRATION</a></li>
		<?php
			if ($_SESSION['loggued_on_user'] !== "") {
		 ?>
		<li class="<?php echo ($pageTitle === 'logout.php' ? 'active' : ''); ?>" id="lideco"><a href="logout.php" id="deco"><i class="fa fa-cog"></i> DECONNEXION</a></li>
		<li class="<?php echo ($pageTitle === 'login.php' ? 'active' : ''); ?>" id="liname"><a href="panier.php" id="name1"><i class="fa fa-cog"></i><?php echo strtoupper($_SESSION['loggued_on_user']); ?> </a></li>
		<?php
	}?>
	</ul>
</nav>
