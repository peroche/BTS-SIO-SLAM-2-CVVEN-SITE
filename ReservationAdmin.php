
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
           <h1>Réservations passées</h1>
        </header>
            
              <?php
        include('menu.php');
        ?>
            <div id="libelle-ReservUtil">

            <?php
		$choix = 3;
		include('requetes.php');
            ?>
                
                
                    <center><b><FONT size="5pt">Réservations passées</FONT></b></center>
				<hr/>
				

				<center><text>Liste des reservation de l'utilisateur :</text>
				<br><br></center>
				<div style="overflow:auto; height:500px;">
				<TABLE class="table"> 
					<TR>
						<TH> Date de la réservation </TH>
						<TH> Début du séjour </TH>
						<TH> Fin du séjour	 </TH>
                                                <TH> Lieu du séjour </TH>
                                                <TH> Logement </TH>
					</TR>
					<?php
                                            foreach ($result as $row) {
                                       
                                        ?>
					<TR>

                                                
                                                <td><?php echo $row["Nom"];?></td>
						<td><?php echo $row["Prenom"];?></td>
						<td><?php echo $row["Email"];?></td>

                                                <TD><form method="post" action="ReservationAdmin.php"> 
							<input type="hidden" name="idUtil" value="<?php echo $row['idUtil']?>" /> 
                            <input type="image" value="Detail" src="img/edit.png" name="Detail"/>
							</form>
						</TD>

                        <TD><form method="post" action="suppr_membre.php"> 
							<input type="hidden" name="idUtil" value="<?php echo $row['idUtil']?>" /> 
                            <input type="image" value="Supprimer" src="img/deleat.png" name="deleat" id="deleat"/>
							</form>
						</TD>
					</TR> 
					<?php
					}
					?>
				</TABLE>
				</div>
				
                                                </div>
		</div>
</head>
</html>

