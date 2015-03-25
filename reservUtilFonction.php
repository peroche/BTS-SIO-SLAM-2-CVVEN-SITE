<?php

include 'connexionBDD.php';
$conectReservUtil = new connexionBDD();

if (isset($_GET['page'])) {
     list($fonction, $idUtil) = explode("-", $_GET['page']);
}


if ($fonction == 'valideDemande') {
    $conectReservUtil->miseAjourEtatReserv('accepter',$idUtil);//accepter une demande
    $conectReservUtil->miseAjourReservAtribuer_heberg($idUtil,'insert');//inserer la demande dans la table atribuer_heberg
    $conectReservUtil->miseAjourNbrHerberg($idUtil,"-1");//reduire le nombre de logement
    header('Location: reservUtilDemande.php');

} elseif ($fonction =='annuleDemande') {
    $conectReservUtil->miseAjourEtatReserv('refuser',$idUtil);// refuser une demande
    header('Location: reservUtilDemande.php');
    
} elseif ($fonction =='demandeAccepter') {
    $conectReservUtil->miseAjourEtatReserv('demande',$idUtil);//mettre en demande une acceptation
    $conectReservUtil->miseAjourReservAtribuer_heberg($idUtil,'delete');//supprimer la demande dans la table atribuer_heberg
    $conectReservUtil->miseAjourNbrHerberg($idUtil,"+1");//augmenter le nombre de logement
    header('Location: reservUtilAccepter.php');
     
} elseif ($fonction =='refuseAccepter') {
    $conectReservUtil->miseAjourEtatReserv('refuser',$idUtil);//refuser une acceptation
    $conectReservUtil->miseAjourReservAtribuer_heberg($idUtil,'delete');//supprimer la demande dans la table atribuer_heberg
    $conectReservUtil->miseAjourNbrHerberg($idUtil,"+1");//augmenter le nombre de logement
    header('Location: reservUtilAccepter.php');
    
} elseif ($fonction =='demandeRefuser') {
    $conectReservUtil->miseAjourEtatReserv('demande',$idUtil);//mettre en demande une refusation
    header('Location: reservUtilRefuser.php');
    
} elseif ($fonction =='valideRefuser') {
    $conectReservUtil->miseAjourEtatReserv('accepter',$idUtil);//accepter une reservation refuser
    $conectReservUtil->miseAjourReservAtribuer_heberg($idUtil,'insert');//inserer la demande dans la table atribuer_heberg
    $conectReservUtil->miseAjourNbrHerberg($idUtil,"-1");//reduire le nombre de logement
    header('Location: reservUtilRefuser.php');
    
} else {
    echo 'Erreur de reservation';
}