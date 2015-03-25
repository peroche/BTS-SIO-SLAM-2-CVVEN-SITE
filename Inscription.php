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
            <h1> Inscription </h1>
        </header>
        <?php include('menu.php') ?>
        <form method="POST" action="validationInscription.php" onSubmit="return validation(this)" >
            <br>
            <table align="center" cellpadding="10" frame="vsides" cellspacing="10" >
                <tr>
                    <td>Login : </td>
                    <td><input type="text" name="login" required   /></td>
                </tr>

                <tr>
                    <td>Nom : </td>
                    <td><input type="text" name="nom" required   /></td>
                </tr>

                <tr>
                    <td>Prénom : </td>
                    <td><input type="text" name="prenom" required   /></td>
                </tr>


                <tr>
                    <td>Mot de passe : </td>
                    <td>
                        <input type="password" name="mdp" required   />
                    </td>
                </tr>

                <tr>
                    <td>Entrez à nouveau le mot de passe : </td>
                    <td>
                        <input type="password" name="mdp1" required   />
                    </td>
                </tr>

		<tr>
                    <td>Email : </td>
                    <td><input type="text" name="email" pattern="^([a-z0-9_\.+-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$"  maxlength="100" required   /></td>
                </tr>

		<tr>
                    <td>Adresse : </td>
                    <td><input type="text" name="adresse" required   /></td>
                </tr>

		<tr>
                    <td>Code Postal : </td>
                    <td><input type="text" name="cp" pattern="^[0-9]{5}$" maxlength="5" required   /></td>
                </tr>

		<tr>
                    <td>Ville : </td>
                    <td><input type="text" name="ville" required   /></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Valider"  > 	</td>
                    <td>
                    </td>
                </tr>
            
</table>
        </form>
    </body>
</html>
