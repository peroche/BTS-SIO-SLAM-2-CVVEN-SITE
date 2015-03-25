<?php
	include('connexion1.php');
        $choix = 5;
	include('requetes.php');

	echo '<p>	<div class="alert alert-success">
					<div class="container">
					<div class="span7 offset2">Suppression effectuée avec succès !</div></div></div><p>';
	include('Portail_admin.php');
	// condition inverse
	if($_POST['idUtil']='')
	{
	echo 'erreur, la ligne demandée n/existe pas';
	}
?>
