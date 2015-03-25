<?php
if( isset($choix)){
        include('connexion1.php');
	//include('connexionBDD.php');
        //$connexion2 = new connexionBDD();
        
	switch($choix){
	case 1: /*login.php*/
		$req= mysqli_prepare($connexion2,"SELECT idUtil, Nom, Prenom, Email FROM utilisateur");
		mysqli_stmt_execute($req);
		mysqli_stmt_bind_result($req, $data['idUtil'], $data['Nom'], $data['Prenom'], $data['Email']);
                
	break;
		/* Portail_admin.php */
	case 2:
		/*$req= mysqli_prepare($base_ec,"SELECT reservation, Date_Depart FROM Reservation WHERE utilisateur = ? AND Date_Depart>='".date('Y-m-d')." 07:00:00' AND modifications !=2 ORDER BY Date_Depart ASC");
		mysqli_stmt_bind_param($req, 'i', $utilisateur);
		mysqli_stmt_execute($req);
		mysqli_stmt_bind_result($req, $data['reservation'], $data['Date_reservation']);
                 * 
                 */
	break;
        
       case 3: 
            $sql = "SELECT idUtil, Login, MdP, Nom, Prenom, Admin, Adresse, CP, Ville, Email FROM utilisateur";
                             $users = $connexion2->query($sql);
                             $result = $users;
            break;
        
        case 4:
		
		$req=mysqli_prepare($connexion2, 'DELETE FROM utilisateur WHERE idUtil = ?');
		mysqli_stmt_bind_param($req, 'i', $_POST['idUtil']);
		mysqli_stmt_execute($req);
		$res = mysqli_stmt_affected_rows($req);
	break;
    
    case 5:
		//$sql = "DELETE FROM utilisateur WHERE idUtil = ?";
                           //  $users = $connexion2->query($sql);
                           //  $result = $users;
		$req=mysqli_prepare($connexion2, 'DELETE FROM utilisateur WHERE idUtil = ?');
		mysqli_stmt_bind_param($req, 'i', $_POST['idUtil']);
		mysqli_stmt_execute($req);
		$res = mysqli_stmt_affected_rows($req);
	break;
    
    case 6://Portail_admin.php
        // $sql = "SELECT idUtil, Login, MdP, Nom, Prenom, Admin, Adresse, CP, Ville, Email FROM utilisateur WHERE idUtil=?";
                           //  $users = $connexion2->query($sql);
                           //  $result = $users;
                             
		$req = mysqli_prepare($connexion2,"SELECT idUtil, Nom, Prenom, MdP,  Email FROM utilisateur WHERE idUtil=?");
		mysqli_stmt_bind_param($req, "i", $_POST['idUtil']);
		mysqli_stmt_execute($req);
		mysqli_stmt_bind_result($req, $data['idUtil'], $data['Nom'], $data['Prenom'], $data['MdP'], $data['Email']);
                
    case 7://modif_membre.php
        $sql = "SELECT idUtil, Login, MdP, Nom, Prenom, Admin, Adresse, CP, Ville, Email FROM utilisateur";
                             $users = $connexion2->query($sql);
                             $result = $users;
                             
		//$req = mysqli_prepare($connexion2,"UPDATE utilisateur SET Nom=?, Prenom=?, Password=?, Email=? WHERE idUtil=? ");
		//mysqli_stmt_bind_param($req, "i", $_POST['Nom'], $_POST['Prenom'], $_POST['MdP'], $_POST['Email'], $_POST['idUtil']);
		//mysqli_stmt_execute($req);
	break;
    
      case 8;      
		//$mois = date('m');
        $req= mysqli_prepare($connexion2,"SELECT idReserv, Date_Arrivee, Date_Depart, Nb_Personnes, Type_pension, FROM reservation WHERE idUtil = ?");
		mysqli_stmt_bind_param($req, 'i', $_POST['idUtil']);
		mysqli_stmt_execute($req);
		mysqli_stmt_store_result($req);
		$nb =  mysqli_stmt_num_rows($req);
		mysqli_stmt_bind_result($req, $data['idReserv'], $data['Date_Arrivee'], $data['Date_Depart'], $data['Nb_Personnes'],$data['Type_pension'] );
    break;
        }
        
        
}
        ?>