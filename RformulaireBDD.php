<?php
session_start();
// verifier si les paramettre entré exite.
if (isset($_POST['Date_Sejour']) && isset($_POST['Type_Pension']) && isset($_POST['Heberg']) && isset($_POST['menage'])&& isset($_POST['Nb_Personnes'])) {
    include 'connexionBDD.php';
    $connexion = new connexionBDD();
    $Date_Sejour = $_POST['Date_Sejour'];//format date date de sejour -> valeur inseré
    $Nb_Personnes = $_POST['Nb_Personnes'];//format int nombre de personne -> valeur inseré
    $menage = $_POST['menage'];//format int menage -> valeur inseré
    $Type_Pension = $_POST['Type_Pension'];//format String type de pension -> valeur inseré
    $idHeberg = $_POST['Heberg'];//format int herbergemetn seletionner
    $Date_Sejour = date('Y-m-d', strtotime($Date_Sejour));// date de sejout converti
    $start = strtotime($Date_Sejour);// date de sejout converti
    $date = strtotime("+7 day", $start);// ajouter 7 jour pour la date de sejout , afin de déterminer la date de depart
    $Date_Fin_Sejour = date('Y-m-d', $date);//date de depart converti
    $id=$_SESSION['idUtil'];//recuperé id de l'utilisateur
    $Jour = date("D", strtotime($Date_Sejour));//verifi si la date saisie est un samedi
        if ($Jour == "Sat") {

    $connexion->ajout_reservation($Date_Sejour, $Date_Fin_Sejour, $Nb_Personnes, $Type_Pension, $menage,$id,$idHeberg);//inserer les valeur de ajout connection
    header('Location: reservation.php?msg=0');// redirection vers la page reservation
    }else{
        header("Location: reservation.php?msg=1");//message d'erreur car se n'est pas un samedi
    }
    
    }else {
        echo 'Erreur site';//erreur de paramettre d'entré incorrect
}

