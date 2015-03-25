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
            <legend>Réservation refuser</legend><br>
            <?php
            include 'connexionBDD.php';
            $aze = new connexionBDD();
            $hello = $aze->reservationEtat("refuser");
            //print_r($hello);
            ?>
            <form method="GET" action="reservUtilFonction.php">
                <table>
                    <tr>
                        <td width="110"><gras>Nom</gras></td>
                    <td width="110">Prenom</td>
                    <td>Date d'arriver</td>
                    <td>Date de départ</td>
                    <td>Type de pension</td>
                    <td>Hebergement</td>
                    <td>Nb pers</td>
                    <td>Demande</td>
                    <td>Valider</td>
                    </tr><?php foreach ($hello as $row) { ?>
                        <tr>
                            <td><?php echo $row["Nom"]; ?></td>
                            <td><?php echo $row["Prenom"]; ?></td>
                            <td><?php echo $row["Date_Arrivee"]; ?></td>
                            <td><?php echo $row["Date_Depart"]; ?></td>
                            <td><?php echo $row["Type_pension"]; ?></td>
                            <td><?php echo $row["typeHeberg"]; ?></td>
                            <td><center><?php echo $row["Nb_Personnes"]; ?></center></td>
                            <td><center><a href="reservUtilFonction.php?page=demandeRefuser-<?php echo $row["idReserv"]; ?>"><img src="img/valider.png" name="demandeRefuser" width="20"/></center></a></td>
                            <td><center><a href="reservUtilFonction.php?page=valideRefuser-<?php echo $row["idReserv"]; ?>"><img src="img/doublevalider.png" name="valideRefuser" width="20"/></center></a></td>
                        </tr><?php
                    }
                    ?>
                </table>
            </form>
        </div>
    </body>
</html>