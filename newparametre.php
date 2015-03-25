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

        <form method="POST" action="newparametre.php" onSubmit="return validation(this)" >
			<table>

				<tr>
                                        <td>Entrer votre nouvelle adresse : </td>
                                        <td><input type="text" name="adresse"   /></td>
				</tr>
				
				<tr>
					<td>Entrer votre nouveau code postal : </td>
                                        <td><input type="text" name="cp"   /></td>
				</tr>
				
				<tr>
					<td>Entre votre nouvelle ville : </td>
                                        <td><input type="text" name="ville"   /></td>
				</tr>

				<tr>
					<td>Entre votre nouvelle email : </td>
                                        <td><input type="text" name="email" pattern="^([a-z0-9_\.+-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$"  maxlength="100"  /></td>
				</tr>
                                
                          </table>
			<br>
		<input type="submit" value="Valider"  > 
                
        </form>
        <br><br>
    </body>
</html>
