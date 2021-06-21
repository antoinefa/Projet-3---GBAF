<?php 
	include "include/header.php";
?>

<div class="pagecentree">
<h1>INSCRIPTION</h1><br/>
	<h2>Créez votre compte</h2>

	<form action="inscription_infos.php" method="post">

    	<p class="inscriptionpage">
    		<label for="nom">Nom:</label><br/> <input class="champsconnexion" type="text" name="nom" id="nom" autofocus required /><br/>
       		<label for="prenom">Prénom:</label><br/> <input class="champsconnexion" type="text" name="prenom" id="prenom" required /><br/>
        	<label for="pseudo">Pseudonyme:</label><br/> <input class="champsconnexion" type="text" name="pseudo" id="pseudo"required /><br/>
        	<label for="motdepasse">Mot de passe:</label><br/> <input class="champsconnexion" type="password" name="motdepasse" id="motdepasse" required /><br/>
        	<label for="questionsecrete">Question secrète:</label><br/> <input class="champsconnexion" type="text" name="questionsecrete" id="questionsecrete" required /><br/>
        	<label for="reponsesecrete">Réponse:</label><br/> <input class="champsconnexion" type="text" name="reponsesecrete" id="reponsesecrete" required /><br/>
        	<input class="envoyercom" type="submit" value="S'inscrire" />
    	</p>

	</form>

</div>

<?php
	include "include/footer.php";
?>