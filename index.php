<?php 
	include "header.php";
?>

<section class="pagecentree">
	<div class="pageindex">
		<h2>Bienvenue !</h2><br/>
		

		<form action="connexion.php" method="post">

			<p>
				<label for="pseudo">Pseudo</label> :<br/> <input class="champsconnexion" type="text" name="pseudo" id="pseudo" autofocus required/><br/>
				<label for="motdepasse">Mot de passe</label> :<br/> <input class="champsconnexion" type="password" name="motdepasse" id="motdepasse" required/><br/>
				<input class="envoyercom" type="submit" value="Connexion" />
			</p>

		</form>

		<p>
			<a href="motdepasseoublie.php">Mot de passe oublié</a>
		</p>

		<p>
			<a href="inscription.php">Inscription</a>
		</p>

	</div>
</section>

<?php
	include "include/footer.php";
?>