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

// vérifier que pseudo n'est pas utilisé
$verif_pseudo = $bdd->prepare('SELECT COUNT(*) AS verif_pseudo FROM account WHERE pseudo = :pseudo');
$verif_pseudo->execute(array('pseudo' => $_POST['pseudo']));
$resultat = $verif_pseudo->fetch();

if ($resultat['verif_pseudo']==0)
{

	//vérifier que tous les champs sont remplis
	if (isset($_POST['nom']) AND isset($_POST['prenom']) AND isset($_POST['pseudo']) AND isset($_POST['motdepasse']) AND isset($_POST['questionsecrete']) AND isset($_POST['reponsesecrete']))
	{
		// Mettre en place variables sécurisées avec htmlspecialchars + hachage mdp
		$nom= htmlspecialchars($_POST["nom"]);
		$prenom= htmlspecialchars($_POST["prenom"]);
		$pseudo= htmlspecialchars($_POST["pseudo"]);
		$motdepasse= htmlspecialchars($_POST["motdepasse"]);
		$passwordHash= password_hash($motdepasse, PASSWORD_DEFAULT);
		$questionsecrete= htmlspecialchars($_POST["questionsecrete"]);
		$reponsesecrete= htmlspecialchars($_POST["reponsesecrete"]);

		// Insertion des données
		$req = $bdd->prepare('INSERT INTO account (nom, prenom, pseudo, motdepasse, questionsecrete, reponsesecrete) VALUES( :nom, :prenom, :pseudo, :motdepasse, :questionsecrete, :reponsesecrete)');
		$req->execute(array('nom'=>$nom, 'prenom'=>$prenom, 'pseudo'=>$pseudo, 'motdepasse'=>$passwordHash, 'questionsecrete'=>$questionsecrete, 'reponsesecrete'=>$reponsesecrete));

	}
}

/*Redirection vers page d'accueil*/

header('Location: index.php');
?>