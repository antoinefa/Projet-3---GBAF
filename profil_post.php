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

$reqdata_user = $bdd->prepare('SELECT * FROM account WHERE id_user = :id_user');
$reqdata_user->execute(array('id_user' => $_SESSION['id_user']));
$data_user = $reqdata_user->fetch();

$isSamePassword = password_verify($_POST['motdepasse'], $data_user['motdepasse']);
$passwordHash= password_hash($_POST['motdepasse'], PASSWORD_DEFAULT);


if (!empty($_POST['nom']) AND ($data_user['nom'] != $_POST['nom']))
{
	$req = $bdd->prepare('UPDATE account SET nom=:nom WHERE id_user = :id_user'); 
	$req->execute(array('id_user'=>$_SESSION['id_user'], 'nom'=>$_POST['nom']));

	
	$_SESSION['nom'] = $_POST['nom'];
}

if (!empty($_POST['prenom']) AND ($data_user['prenom'] != $_POST['prenom']))
{
	$req = $bdd->prepare('UPDATE account SET prenom=:prenom WHERE id_user = :id_user'); 
	$req->execute(array('id_user'=>$_SESSION['id_user'], 'prenom'=>$_POST['prenom']));


	$_SESSION['prenom'] = $_POST['prenom'];
}

if (!empty($_POST['pseudo']) AND ($data_user['pseudo'] != $_POST['pseudo']))
{
	$req = $bdd->prepare('UPDATE account SET pseudo=:pseudo WHERE id_user = :id_user'); 
	$req->execute(array('id_user'=>$_SESSION['id_user'], 'pseudo'=>$_POST['pseudo']));
	

	$_SESSION['pseudo'] = $_POST['pseudo'];
}

if (!empty($_POST['motdepasse']) AND (!$isSamePassword))
{
	$req = $bdd->prepare('UPDATE account SET motdepasse=:motdepasse WHERE id_user = :id_user'); 
	$req->execute(array('id_user'=>$_SESSION['id_user'], 'motdepasse'=>$passwordHash));
}

if (!empty($_POST['questionsecrete']) AND ($data_user['questionsecrete'] != $_POST['questionsecrete']))
{
	$req = $bdd->prepare('UPDATE account SET questionsecrete=:questionsecrete WHERE id_user = :id_user'); 
	$req->execute(array('id_user'=>$_SESSION['id_user'], 'questionsecrete'=>$_POST['questionsecrete']));
}

if (!empty($_POST['reponsesecrete']) AND ($data_user['reponsesecrete'] != $_POST['reponsesecrete']))
{
	$req = $bdd->prepare('UPDATE account SET reponsesecrete=:reponsesecrete WHERE id_user = :id_user'); 
	$req->execute(array('id_user'=>$_SESSION['id_user'], 'reponsesecrete'=>$_POST['reponsesecrete']));
}

header('Location: profil.php');

?>
