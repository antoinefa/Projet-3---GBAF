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
$nouveaumotdepasse = $_POST['nouveaumotdepasse'];
$passwordHash = password_hash($nouveaumotdepasse, PASSWORD_DEFAULT);


$req_update_mdp = $bdd->prepare('UPDATE account SET motdepasse = :nouveaumotdepasse WHERE id_user = :id_user');
$req_update_mdp->execute(array('id_user'=>$id_user, 'nouveaumotdepasse'=>$passwordHash));


header('Location: index.php');

?>