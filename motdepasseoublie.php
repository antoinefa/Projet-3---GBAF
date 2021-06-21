<?php 
	include "header.php";
?>

<div class="pagecentree">
<h1>MOT DE PASSE OUBLIÉ</h1><br/>
<h2>Veuillez renseigner votre pseudonyme</h2>

<form action="motdepasseoublie_infos.php" method="post">

		<p class="newmdp">
			
			<label for="pseudo">Pseudo</label> : <input type="text" class="champsconnexion" name="pseudo" id="pseudo"/><br/>
			<input class="envoyercom" type="submit" value="Envoyer" />
		</p>

</form>
</div>

<?php
	include "include/footer.php";
?>