<?php
$connexlog = new connexionBDD();
$sql = "SELECT idHeberg, typeHeberg, nbrLogement FROM hebergement";
$users = $connexlog->query($sql);
$result = $users;
echo '<table border=1 align="center">';
    echo '<tr>';
    echo '<td>'.'Type herbergement'.'</td>';
    echo '<td>'.'Nombre de logement disponible'.'</td>';
    echo '</tr>';
foreach ($result as $row) {
    echo '<tr>';
    echo '<td>'.$row["typeHeberg"].'</td>';
    echo '<td><center>'.$row["nbrLogement"].'</center></td>';
    echo '</tr>';
}
echo '<table>';
echo '<br>';
