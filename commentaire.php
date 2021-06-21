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

$id_user=$_SESSION['id_user'];
$id_acteur=$_POST['id_acteur'];

/*Vérif qu'il n'existe pas déjà un com de cet user sur cet acteur*/
$nb_comm_user = $bdd->prepare('SELECT COUNT(*) AS nb_comm FROM commentaires WHERE id_acteur = :id_acteur AND id_user= :id_user');
$nb_comm_user->execute(array('id_acteur'=>$id_acteur, 'id_user'=>$id_user));
$nb_commentaire_user = $nb_comm_user->fetch();

if ((isset($_POST['commentaire'])) AND ($nb_commentaire_user['nb_comm'] == 0))
{
	$commentaire = htmlspecialchars($_POST['commentaire']);

	$post_comm = $bdd->prepare('INSERT INTO commentaires (id_user, id_acteur, date_add, commentaire) VALUES (:id_user, :id_acteur, CURDATE(), :commentaire)');
	$post_comm->execute(array('id_user'=>$id_user, 'id_acteur'=>$id_acteur, 'commentaire'=>$commentaire));

}

header('Location:acteurs.php?acteur=' . $id_acteur );

?>