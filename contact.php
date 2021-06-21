<?php 
	include "header.php";
 ?>

<section class="contact">

    <div class="container">
    <h1>CONTACT</h1>
      <form method="post" action="traitement_formulaire.php">
        <label for="nom">Nom & Prénom</label><br/>
        <input type="text" id="nom" name="nom" placeholder="Votre nom et prénom"><br/>

        <label for="sujet">Sujet</label><br/>
        <input type="text" id="sujet" name="sujet" placeholder="L'objet de votre message"><br/>

        <label for="emailAddress">Email</label><br/>
        <input id="emailAddress" type="email" name="email" placeholder="Votre email"><br/>


        <label for="message">Message</label><br/>
        <textarea id="message" name="message" placeholder="Votre message" style="height:200px"></textarea><br/>

        <input class="envoyercom" type="submit" name="envoi" value="Envoyer">
      </form>
    </div>
   
</section>

 <?php
	include "include/footer.php";
  ?>