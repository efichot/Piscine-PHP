<?php
	session_start();
 ?>

<!DOCTYPE html>
<html lang="fr">
	<?php include_once('views/head.php'); ?>
	<body>
		<?php include_once('views/nav.php'); ?>

			<form method="post" action="categories.php" enctype="multipart/form-data">

				<label for="name">Nom du chat: </label>
				<input id="name" type="text" name="name" value="" placeholder="Nom" required>

				<label for="price">Prix: </label>
				<input id="price" type="text" name="price" value="" placeholder="Prix" required>

				<label for="category">Catégories: </label>
				<input id="category" type="text" name="category" value="" placeholder="categories1 categories2" required>

				<label for="describe" style="text-align:center;">Descriptif: </label>
				<textarea id="describe" type="area" name="describ" value="" placeholder="Décrivez votre chat." required></textarea>

				<input type="hidden" name="MAX_FILE_SIZE" value="30000" />
				<input type="file" name="img" accept="image/*"/>

				<button type="submit" name="button">Ajouter</button>

			</form>


		<?php include_once('views/footer.html'); ?>
	</body>
</html>
