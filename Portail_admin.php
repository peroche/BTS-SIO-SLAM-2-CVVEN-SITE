
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
           <h1>Portail Administrateur</h1>
        </header>
            
              <?php
        include('menu.php');
        ?>
            <div id="libelle-ReservUtil">

            <?php
            include('connexion1.php');
		$choix = 1;
		include('requetes.php');
            ?>
                
                
                   <center><b><FONT size="5pt">Portail administrateur</FONT></b></center>
				<hr/>
				

				<center><text>Liste des membres du site :</text>
				<br><br></center>
				<div style="overflow:auto; height:500px;">
				<TABLE class="table"> 
					<TR>
						<TH> Nom </TH>
						<TH> Prenom </TH>
						<TH> Email </TH> 
                                                <TH> Modifier </TH>
                                                <TH> Supprimer </TH>
					</TR>
					<?php
					while(mysqli_stmt_fetch($req))
					{
					?>
					<TR>
						<td><?php echo $data['Nom'];?></td>
						<td><?php echo $data['Prenom'];?></td>
						<td><?php echo $data['Email'];?></td>
                                      
                                                <td><form method="post" action="modif_membre.php">
							<input type="hidden" name="idUtil" value="<?php echo $data['idUtil']?>" /> 
                        	<input class="btn" type="submit" value="Editer" name="Editer"/>
						
						</form>
						</td> 

                                               <!-- <TD><form method="post" action=" ReservationAdmin.php"> 
							<input type="hidden" name="idUtil" value="<?php echo $data['idUtil']?>" /> 
                            <input type="image" value="Detail" src="img/edit.png" name="Detail"/>
							</form>
						</TD>-->

                        <TD><form method="post" action="suppr_membre.php"> 
							<input type="hidden" name="idUtil" value="<?php echo $data['idUtil']?>" /> 
                            <input type="image" value="Supprimer" src="img/deleat.png" name="deleat" id="deleat"/>
							</form>
						</TD>
					</TR> 
					<?php
					}
					mysqli_stmt_close($req); 
					?>
				</TABLE>
				</div>
				<br/>
						
</head>
</html>

