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
            <legend>Réservation accepter</legend><br>
            <?php
            include 'connexionBDD.php';
            $aze = new connexionBDD();
            $hello = $aze->reservationEtat("accepter");
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
                        <td>Demande</td>
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
                            <td><center><a href="reservUtilFonction.php?page=demandeAccepter-<?php echo $row["idReserv"]; ?>"><img src="img/refuser.png" name="demandeAccepter" width="20"/></a></center></td>
                            <td><center><a href="reservUtilFonction.php?page=refuseAccepter-<?php echo $row["idReserv"]; ?>"><img src="img/doublerefuser.png" name="refuseAccepter" width="20"/></a></center></td>
                        </tr><?php
                    }
                    ?>
                </table>
            </form>
        </div>
    </body>
</html>