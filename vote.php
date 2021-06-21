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
?>


<?php

$id_user=$_SESSION['id_user'];
$id_acteur=$_GET['acteur'];
$vote=$_GET['vote'];


$req_vote_user = $bdd->prepare('SELECT COUNT(*) AS nb_vote FROM vote WHERE id_acteur = :id_acteur AND id_user= :id_user');
$req_vote_user->execute(array('id_acteur'=>$id_acteur, 'id_user'=>$id_user));
$nb_vote_user = $req_vote_user->fetch();

$vote_existe = $nb_vote_user['nb_vote'];

if ($vote_existe == 0)
{
	


	$vote_post=$bdd->prepare('INSERT INTO vote(id_user, id_acteur, vote) VALUES (:id_user, :id_acteur, :vote)');
	$vote_post->execute(array('id_user'=>$id_user,'id_acteur'=>$id_acteur, 'vote'=>$vote));
}
else
{
	$vote_post=$bdd->prepare('UPDATE vote set vote=:vote WHERE id_user=:id_user AND id_acteur=:id_acteur');
	$vote_post->execute(array('id_user'=>$id_user,'id_acteur'=>$id_acteur, 'vote'=>$vote));
}


header('Location:acteurs.php?acteur=' . $id_acteur);

?>