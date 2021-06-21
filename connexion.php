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


if (isset($_POST['pseudo']) AND isset($_POST['motdepasse']))
{

	$pseudo = htmlspecialchars($_POST['pseudo']);
	$motdepasse = htmlspecialchars($_POST['motdepasse']);

	$req = $bdd->prepare('SELECT id_user, motdepasse, nom, prenom, pseudo FROM account WHERE pseudo = :pseudo');
	$req->execute(array('pseudo' => $pseudo));
	$resultat = $req->fetch();


	$isPasswordCorrect = password_verify($motdepasse, $resultat['motdepasse']);

		if (!$resultat)
		{
    		echo 'Mauvais identifiant ou mot de passe !';
		}

		else
		{
		    if ($isPasswordCorrect) 
		    {
		        session_start();
		        $_SESSION['id_user'] = $resultat['id_user'];
		        $_SESSION['nom'] = $resultat['nom'];
		        $_SESSION['prenom'] = $resultat['prenom'];
		        $_SESSION['pseudo'] = $pseudo;

		        header('Location: accueil.php');
		    }

		    else 
		    {
		        echo 'Mauvais identifiant ou mot de passe !';
		    }  
		}
}
?>