
<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <?php
    include('header.php');
    ?>
        <body>
             <header>
                  <h1>Modification membre</h1>
	 </header>
            
              <?php
        include('menu.php');
        ?>
            <div id="libelle-ReservUtil">

	      <?php 
              include('connexion1.php');
          $choix = 6;
          include ('requetes.php');
          ?>



	
		<center><b><br><FONT size="5pt">Modification du membre</FONT></b>
		
                <form method="get" action="modification_membre.php">
				<?php
				while(mysqli_stmt_fetch($req))
				{
				?>
			
			<input type="hidden" name="idUtil" value="<?php echo $data['idUtil']?>" />	
			
			<p>
				<label>Nom :</label>
			<input name='Nom' type="text" value="<?php echo $data['Nom'];?>">
                        </p>

			<p>
				<label>Prénom :</label>
			<input name="Prenom" type="text" value="<?php echo $data['Prenom'];?>">
                        </p>

			<p>
				<label>Mot de passe :</label>
                                <input  name="MdP" type="password" value="<?php echo $data['MdP']?>" >
                        </p>

                        <p>
				<label>Email :</label>
			<input name="Email" type="text" value="<?php echo $data['Email']?>">
                        </p>

			<?php
                                }
			mysqli_stmt_close($req); 
			?>
			</form>
			<br>

			<button name='Valider' class="btn btn-primary" type="submit" > Valider </button>

			<ul class="pager">
				<li class="previous">
				<a href="Portail_admin.php">&larr; Page précédente</a>
				</li>
			</ul><br>

	</div></div>
	</body>
</html>
