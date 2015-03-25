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
            <h1>Gestion des Réservations</h1>
        </header>
        <?php
        include('menu.php');

        include('sommaire-ReservUtil.php');
        ?>
        <div id="libelle-ReservUtil">
            <legend>Demmande de réservation</legend><br>
            <?php
            include 'connexionBDD.php';
            $aze = new connexionBDD();
            $hello = $aze->reservationEtat("demande");
            //print_r($hello);
            ?>
            <form method="GET" action="reservUtilFonction.php">
                <table border="1" >
                    <tr>
                        <td>Nom</td>
                        <td>Prenom</td>
                        <td>Date d'arriver</td>
                        <td>Date de départ</td>
                        <td>Type de pension</td>
                        <td>Hebergement</td>
                        <td>Nb pers</td>
                        <td>Valider</td>
                        <td>Refuser</td>
                    </tr><?php foreach ($hello as $row) { ?>
                        <tr>
                            <td width="150"><?php echo $row["Nom"]; ?></td>
                            <td width="150"><?php echo $row["Prenom"]; ?></td>
                            <td width="90"><?php echo $row["Date_Arrivee"]; ?></td>
                            <td width="90"><?php echo $row["Date_Depart"]; ?></td>
                            <td><?php echo $row["Type_pension"]; ?></td>
                            <td width="400"><?php echo $row["typeHeberg"]; ?></td>
                            <td width="70"><center><?php echo $row["Nb_Personnes"]; ?></center></td>
                        <td><center><a href="reservUtilFonction.php?page=valideDemande-<?php echo $row["idReserv"]; ?>"><img src="img/valider.png" name="valideDemande" width="20"/></center></a></td>
                        <td><center><a href="reservUtilFonction.php?page=annuleDemande-<?php echo $row["idReserv"]; ?>"><img src="img/refuser.png" name="annuleDemande" width="20"/></center></a></td>
                        </tr><?php
                    }
                    ?>
                </table>
            </form>
        </div>
    </body>
</html>