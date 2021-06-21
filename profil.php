
<?php 
	include "header.php";
	
	//print_r($_SESSION);

	try

{
	$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

	$req = $bdd->prepare('SELECT questionsecrete FROM account WHERE id_user = '.$_SESSION['id_user']);
	$req->execute();
	$resultat = $req->fetch();
 ?>

<div class="pagecentree">
<h1>MODIFIER MES INFORMATIONS</h1>


	<form action="profil_post.php" method="post">

		<p class="modifinfos">
			<label for="nom">Nom:</label><input class="champsconnexion" type="text" name="nom" id="nom" autofocus value="<?php echo $_SESSION['nom'];?>" /> <br/>
			<label for="prenom">Prénom:</label><input type="text" class="champsconnexion" name="prenom" id="prenom" value="<?php echo $_SESSION['prenom'];?>"/><br/>
			<label for="pseudo">Pseudo:</label><input type="text" class="champsconnexion" name="pseudo" id="pseudo" value="<?php echo $_SESSION['pseudo'];?>"/><br/>
			<label for="motdepasse">Mot de passe:</label><input type="password" class="champsconnexion" name="motdepasse" id="motdepasse"/><br/>
			<label for="questionsecrete">Question secrète:</label><input type="text" class="champsconnexion" name="questionsecrete" id="questionsecrete" value="<?php echo $resultat['questionsecrete'];?>"/><br/>
			<label for="reponsesecrete">Réponse:</label><input type="text" class="champsconnexion" name="reponsesecrete" id="reponsesecrete"/><br/>
			<input type="submit" value="Enregistrer" class="envoyercom"/>
		</p>

	</form>

</div>

 
<?php
	include "include/footer.php";
?>