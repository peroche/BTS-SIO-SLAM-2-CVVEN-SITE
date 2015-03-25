<?php
session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <?php
    include('header.php');
?>
    <body>
	<header>
        <h1> Paramètres généraux du compte </h1>
	</header>
<?php include('menu.php') ?>
<br>
<table align="center"cellpadding="10" frame="vsides" cellspacing="10" >
<tr>
        <td><a href="ChangementMDP.php">Changement de mot de passe</a></td>
	<td><a href="newparametre.php">Modifier les paramètre du compte</a></td>
</tr>
</table>
        <br><br>
    </body>
</html>
