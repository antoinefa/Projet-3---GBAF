	<?php 
		session_start();
	?>

<!DOCTYPE html>
<html lang="fr">
	<head>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="style/style.css" />
		<title>GBAF</title>
		
	</head>

	<body>

		<div id="main">

			<header>
				
				<?php    
					if (isset($_SESSION['id_user']) AND isset($_SESSION['nom']) AND isset($_SESSION['prenom']))       
					{   
				?>  
				<nav>
					<p> <a href="accueil.php"><img class="logo" src="images/logo_gbaf.png" alt="Logo GBAF" /></a></p>

					<div class="navdroite"><img class="iconemembre" src="images/iconemembre.png" alt="Icone de Membre"/>


				<?php
						echo '<p class="Bienvenue">Bienvenue ' . $_SESSION['prenom'] . ' ' . $_SESSION['nom'] . ' ! <br/>';    
				?>
					<a href="profil.php">Paramètres</a> | <a href="deconnexion.php">Déconnexion</a></div>
				</nav>
				<?php
					}  
					else
					{
				?>
					<p> <a href="index.php"><img class="logo" src="images/logo_gbaf.png" alt="Logo GBAF" /></a> </p>
				<?php
					}
				?>
					



			</header>

