<?php 
include "header.php";
 ?>

<?php	

		try
			{
				$bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 'root', '');
			}
		catch(Exception $e)
			{
			        die('Erreur : '.$e->getMessage());
			}
?>

<section class="sectionpresentation">

	<div>
		<?php

			$id_acteur=$_GET['acteur'];
			$id_user=$_SESSION['id_user'];

			$detailActeur = $bdd->prepare('SELECT * FROM acteurs WHERE id_acteur = :id_acteur');
			$detailActeur->execute(array('id_acteur'=>$id_acteur));
			$donnees = $detailActeur->fetch();


		?>


		<img class="logo_acteur" src="<?php echo $donnees['logo']; ?>"/>
		<h2><?php echo $donnees['acteur']; ?></h2>
		<p class="presentation"><?php echo $donnees ['adressesite']; ?><br/>
		<br/>
		<?php echo nl2br($donnees['description']); ?></p>

	</div>
	
		<?php	$detailActeur->closeCursor();   ?>


</section>




<section class="sectioncommentaires">

	<div class="nb_commentaires_likes">
		
		<!-- afficher le nb de commentaires dans ma bdd
			afficher bouton pour commenter
			afficher bouton pour liker

			afficher les derniers commentaires -> afficher pour chaque commentaire le prenom , la date , et le commentaire -->
			<div class="nb_commentaires">
				<?php

					$nb_comm = $bdd->prepare('SELECT COUNT(*) AS nb_comm FROM commentaires WHERE id_acteur = :id_acteur');
					$nb_comm->execute(array('id_acteur'=>$id_acteur));
					$nb_commentaire = $nb_comm->fetch();

					echo '<p>' . $nb_commentaire['nb_comm'] .  ' commentaire(s)</p>'

				?>
			</div>

				<?php


               

                $likes = $bdd->prepare('SELECT COUNT(*) AS nb_likes FROM vote WHERE id_acteur = :id_acteur AND vote = 1');
                $likes->execute(array('id_acteur'=>$id_acteur));
                $nb_likes = $likes->fetch();


                $dislikes = $bdd->prepare('SELECT COUNT(*) AS nb_dislikes FROM vote WHERE id_acteur = :id_acteur AND vote = 0');
                $dislikes->execute(array('id_acteur'=>$id_acteur));
                $nb_dislikes = $dislikes->fetch();

            
                ?>

			<div class="nb_likes">

				<a class="likes" href="vote.php?acteur=<?php echo $id_acteur; ?>&amp;vote=1"><?php echo $nb_likes['nb_likes']; ?><img class="poucevert" src="images/like.png" alt="Pouce Like"/></a>
                <a class="dislikes" href="vote.php?acteur=<?php echo $id_acteur; ?>&amp;vote=0"><?php echo $nb_dislikes['nb_dislikes']; ?><img class="poucerouge" src="images/dislike.png" alt="Pouce Like"/></a>

            </div>
    </div>

    <div class="commentaires">

                <p class="derniers_comm"> Les commentaires récents : </p>

               
                <?php
                
                    $getCommentaire= $bdd->prepare('SELECT * FROM commentaires WHERE id_acteur = :id_acteur ORDER BY id_post DESC LIMIT 0, 3');
                    $getCommentaire->execute(array('id_acteur'=>$id_acteur));
                    while ($commentaire = $getCommentaire->fetch()) 
                    	{
                        	$id_auteur=$commentaire['id_user'];

                        	$auteur = $bdd->prepare('SELECT prenom FROM account WHERE id_user = :id_user');
                       		$auteur->execute(array('id_user'=>$id_auteur));
                       		$donnees = $auteur->fetch();
                               
                   
                        	echo '<div class="commentaire"><div class="infos_comm"><p class="prenom_comm">Posté par : ' . $donnees['prenom'] . '</p>'; 
                        	echo '<p class="date_comm">Le  ' . $commentaire['date_add'] . '</p></div>';
                        	echo '<p class="comm">' . nl2br($commentaire['commentaire']) . '</p></div>';
        				
        				}

        				$nb_comm_user = $bdd->prepare('SELECT COUNT(*) AS nb_comm FROM commentaires WHERE id_acteur = :id_acteur AND id_user = :id_user');
						$nb_comm_user->execute(array('id_acteur'=>$id_acteur, 'id_user'=>$id_user));
						$nb_commentaire_user = $nb_comm_user->fetch();

						if ($nb_commentaire_user['nb_comm']== 0)
						{



				?>
			
			<div class="nouveau_comm">
				<p>Ajouter un commentaire : <br/>

		            <form action="commentaire.php" method="POST">
		                <input type="hidden" name="id_acteur" value="<?php echo $id_acteur; ?>" />
		                <textarea rows="8" name="commentaire"></textarea>
		                <input class="envoyercom" type="submit" value="Envoyer">
		            </form>

	            </p>
	        </div>
	        <?php 
	        }
	        ?>
		
	</div>
	


</section>


<?php
	include "include/footer.php";
  ?>