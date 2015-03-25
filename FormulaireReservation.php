<br>

<center><b><br><FONT size="5pt">Ajout d'une réservation</FONT></b>
    <hr>
    <?php
if($_GET['msg'] == 1) {
echo "<b><FONT size='2pt'>Vous n'avez pas réserver un samedi</FONT></b>";
echo '<hr>';
}else{
    echo "<b><FONT size='2pt'>Vous devais reserver un samedi</FONT></b>";
}?>

    <form method="POST" action="RformulaireBDD.php">
        <table>
            <tr>
                <td><label>Date de Début du séjour :</label></td>
                <td><input name='Date_Sejour' type="text" placeholder="00-12-0000" pattern="\d{1,2}-\d{1,2}-\d{4}" requiredid="datepicker1 " required></td>
            </tr>
            <tr>
                <td><label>Nombre de perosnne :</label></td>
                <td><input name='Nb_Personnes' type="number" min="1" value ="1" id="datepicker1 required"></td>
            </tr>
            <tr>
                <td><label>Type de pension</label></td>
                <td>
                    <INPUT type="radio" name="Type_Pension" value="pension complete">pension complète
                    <INPUT type="radio" name="Type_Pension" value="demi pension">demi-pension
                </td>
            </tr>
            <tr>
                <td><label>ménage fin de séjour</label></td>
                <td>
                    <INPUT type="radio" name="menage" value="1" required>oui
                    <INPUT type="radio" name="menage" value="0" required>non
                </td>
            </tr>
        </table>
        <?php
        $sql = "SELECT idHeberg, typeHeberg, nbrLogement FROM hebergement where nbrLogement>0";
        $t = new connexionBDD();
        $users = $t->query($sql);
        echo '<table border=1>';
        echo '<tr>';
        echo '<td>' . 'Type herbergement' . '</td>';
        echo '<td>' . 'Nombre de logement disponible' . '</td>';
        echo '<td> Choix </td>';
        echo '</tr>';
        foreach ($users as $row) {
            echo '<tr>';
            echo '<td>' . $row["typeHeberg"] . '</td>';
            echo '<td><center>' . $row["nbrLogement"] . '</center></td>';
            echo '<td><center><INPUT type="radio" name="Heberg" value="' . $row["idHeberg"] . '" required></center></td>';
            echo '</tr>';
        }
        echo '</table>';
        ?>
        <button name='reserver' type="submit" > Réserver </button>
    </form></center>