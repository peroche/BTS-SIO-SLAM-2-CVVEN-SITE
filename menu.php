<nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <?php
        if (isset($_SESSION['login'])) {
                if($_SESSION['admin']==0){

                ?>
                <li><a href="reservation.php?msg=0">Reservation util</a></li>
                <li><a href="parametre.php">Paramètre util</a></li>
                <li><a href="deconnexion.php">Deconnexion util</a></li>
            <?php
                }else{
                                ?>
                <li><a href="parametre.php">Paramètre</a></li>
                <li><a href="calendrierEtLogement.php">Calendrier et logement disponible</a></li>
                <li><a href="Portail_admin.php">Gestion des utilisateurs</a></li>
                <li><a href="reservUtilDemande.php">Gestion des reservations</a></li>
                <li><a href="deconnexion.php">Deconnexion</a></li>
            <?php
                }
        }
        else {
            ?>
            <li><a href="Inscription.php">Inscription</a></li>
            <li><a href="connexion.php">Connexion</a></li>
        <?php } ?>
    </ul>
</nav>
