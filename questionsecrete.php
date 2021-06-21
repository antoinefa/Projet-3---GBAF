<?php 
	include "header.php";


try
{
	$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$pseudo = $_GET['pseudo'];

$verif_question = $bdd->prepare('SELECT questionsecrete, id_user FROM account WHERE pseudo = :pseudo');
$verif_question->execute(array('pseudo'=>$pseudo));
$retourquestion = $verif_question->fetch();

?>

<div class="pagecentree">
<h1>QUESTION SECRÈTE</h1>

<p><?php echo $retourquestion['questionsecrete']; ?></p>

<form action="questionsecrete_infos.php" method="post">

		<p class="reponsesecrete">
			<input class="questionreponse" type="hidden" name="id_user" value="<?php echo $retourquestion['id_user'] ;?>"/>
			<label for="reponsesecrete">Réponse</label><input type="text" class="champsconnexion" name="reponsesecrete" id="reponsesecrete"/><br/>
			<input class="envoyercom" type="submit" value="Envoyer" />
		</p>

</form>
</div>


<?php
	include "include/footer.php";
?>