<?php 
	include "include/header.php";
?>

<div class="pagecentree">
<h1>CHANGEMENT DE MOT DE PASSE</h1>

<form action="nouveaumotdepasse_infos.php" method="post">

		<p class="newmdp">
			<input type="hidden" name="id_user" value="<?php echo $_GET['id_user']; ?>"/>
			<label for="nouveaumotdepasse">Votre nouveau mot de passe:</label><input type="password" class="champsconnexion" name="nouveaumotdepasse" id="nouveaumotdepasse"/><br/>
			<input class="envoyercom" type="submit" value="Valider" />
		</p>

</form>
</div>

<?php
	include "include/footer.php";
?>