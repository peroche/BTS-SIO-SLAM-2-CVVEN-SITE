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
            <h1> Reservation </h1>
        </header>
        <?php include('menu.php') ?>
<center>    <center><img src="img/legende2.jpg" class="legendecalendrier">
        <?php
        require("calendrier/class.calendrier.inc.php");
        if (isset($_GET['annee'])) {
            $annee = $_GET['annee'];
        } else {
            $annee = date('Y');
        }


        //Affichage du calendrier du mois en cours
        $cal = new calendrier($annee);
        //$cal->afficher_calendrier_mois_annee(date('n'),date('Y'));
        $cal->afficher_calendrier_annee();


        echo '<table class="cal-navig">
                                        <tr>
                                            <td class="anneeprec">
                                                <a href="reservation.php?annee=' . ($annee - 1) . '">
                                                    <img src="img/prec.png" alt="' . ($annee - 1) . '" style="border:none;" />
                                                </a>
                                            </td>
                                            <td class="anneesuiv">
                                                <a href="reservation.php?annee=' . ($annee + 1) . '">
                                                    <img src="img/suiv.png" alt="' . ($annee + 1) . '" style="border:none;" />
                                                </a>
                                            </td>
                                       </tr>
              </table></center>';

        include 'logement.php';
        ?></center>
    </body>
</html>
