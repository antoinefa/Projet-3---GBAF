<?php 
	session_start();
 ?>

<?php

/*Supprimer la session et ses variables*/

$_SESSION = array();
session_destroy();

header('Location: index.php')
?>
