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

$id_user = $_POST['id_user'];
$reponsesecrete = $_POST['reponsesecrete'];

$verif_reponse = $bdd->prepare('SELECT reponsesecrete FROM account WHERE id_user = :id_user');
$verif_reponse->execute(array('id_user'=>$id_user));
$reponseverif = $verif_reponse->fetch();

if ($reponseverif['reponsesecrete'] == $reponsesecrete)
{

	header('Location:nouveaumotdepasse.php?id_user=' . $id_user);

}
else
{
	echo '<p>Mauvaise réponse !<br/><a href="motdepasseoublie.php">Recommencer.</a></p>';
}


?>


