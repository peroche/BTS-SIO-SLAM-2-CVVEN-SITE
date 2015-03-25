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
            <h1> Connexion Utilisateur </h1>
        </header>
        <?php include('menu.php') ?>
        
        <form method="POST" action="validationUtilisateur.php" onSubmit="return validation(this)" >
             <br>
            <table align="center" cellpadding="10" frame="vsides" cellspacing="10" >
                <tr>
                    <td>Login : </td>
                    <td><input type="text" name="login" required   /></td>
                </tr>

                <tr>
                    <td>Mot de passe : </td>
                    <td>
                        <input type="password" name="mdp" required   />
                    </td>
                </tr>
<tr>
                    <td><input type="submit" value="Valider"  > </td>
                    <td></td>
                </tr>
            </table>
           
            	

        </form>
    </body>
</html>
