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
        <h1> Changer le mot de passe </h1>
	</header>
<?php include('menu.php') ?>

        <form method="POST" action="newmdp.php" onSubmit="return validation(this)" >
			<table>

				<tr>
                                        <td>Entrer votre ancien mot de passe : </td>
                                        <td><input type="password" name="mdp" required   /></td>
				</tr>
				
				<tr>
					<td>Entrer votre nouveau mot de passe : </td>
                                        <td><input type="password" name="newmdp" required   /></td>
				</tr>
				
				<tr>
					<td>Ressaisissez le mot de passe : </td>
                                        <td><input type="password" name="newmdp1" required   /></td>
				</tr>


                                
                          </table>
			<br>
		<input type="submit" value="Valider"  > 
                
        </form>
        <br><br>
    </body>
</html>
