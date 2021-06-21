<?php
session_start();

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}

$pseudo = $_POST['pseudo'];

$verif_user = $bdd->prepare('SELECT COUNT(pseudo) AS exist FROM account WHERE pseudo = :pseudo');
$verif_user->execute(array('pseudo'=>$pseudo));
$userverif = $verif_user->fetch();

if ($userverif['exist'] == 1)
{

	header('Location:questionsecrete.php?pseudo=' . $pseudo);

	
}
else
{
	echo '<p>Identifiant erroné ou inexistant.<br/><a href="motdepasseoublie.php">Retapez votre identifiant</a> ou <a href="inscription.php">Inscrivez-vous !</a></p>';
}

?>


