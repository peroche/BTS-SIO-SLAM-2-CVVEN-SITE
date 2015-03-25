<?php

/**
 * Classe de connexion avec PDO
 * 
 * 
 */
class connexionBDD extends PDO {
    /**
     *  Constructeur qui hérite du constructeur de la classe PDO
     */
    public function __construct() {
        $this->sgbd = 'mysql';
        $this->hote = 'localhost';
        $this->bd = 'cvven_qtt2';
        $this->user = 'root';
        $this->pass = 'root';
        $dsn = $this->sgbd . ':dbname=' . $this->bd . ";host=" . $this->hote;        
        //Appel du constructeur parent
        parent::__construct($dsn, $this->user, $this->pass, array());
           $this->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $this->query("SET NAMES 'UTF8'");
            $this->query("SET CHARACTER SET UTF8");
        }
    /**
     * Fonction qui renvoie le nombre de réservation pour une personne
     * 
     * @todo Renvoyer la liste des réservations
     * 
     * @param int $jour
     * @param int $mois
     * @param int $annee
     * @param type $id
     * @return int
     */
    public function est_reserve_util($jour, $mois, $annee, $id) {
        $ma_date = $annee . '-' . $mois . '-' . $jour;

        $requete = "Select COUNT(*) FROM reservation, utilisateur
                    WHERE '$ma_date' BETWEEN Date_Arrivee AND SUBDATE(Date_Depart,1)
                    AND reservation.idUtil=utilisateur.idUtil
                    AND Login='$id'" or die("erreur est_reserve");

        $resultat_requete = $this->query($requete);
        $resultat = $resultat_requete->fetchColumn();
        return $resultat;
    }

    /**
     * Fonction qui prend en paramètre une date et qui renvoie le nombre de réservations ce jour.
     * 
     * 
     * @param int $jour
     * @param int $mois
     * @param int $annee
     * @return int
     */
    public function est_reserve($jour, $mois, $annee) {

        $ma_date = $annee . '-' . $mois . '-' . $jour;

        $requete = "Select COUNT(*) FROM reservation
                    WHERE '$ma_date' BETWEEN Date_Arrivee AND SUBDATE(Date_Depart,1)";

        $resultat_requete = $this->query($requete) or die("erreur est_reserve");
        $resultat = $resultat_requete->fetchColumn();

        return $resultat;
    }

    public function est_complet($jour, $mois, $annee) {

        $ma_date = $annee . '-' . $mois . '-' . $jour;

        //Nombre d'attributions de réservations pour une date
        $requete = "Select COUNT(*)"
                . "FROM reservation r, attribuer_heberg a "
                . "WHERE '$ma_date' BETWEEN r.Date_Arrivee AND SUBDATE(r.Date_Depart,1)"
                . "AND r.idReserv=a.idReserv AND r.EtatReservation!='refuser';";

        $resultat_requete = $this->query($requete) or die("erreur est_complet: $requete");
        $resultat = $resultat_requete->fetchColumn();


        //Nombre d'hébergements disponibles
        $requete2 = "Select* From hebergement";


        $resultat_requete2 = $this->query($requete2) or die("erreur est_complet 2");
        $resultat2 = $resultat_requete2->fetchColumn();

        return $resultat == $resultat2;
    }

    public function inserserutil() {
        $login = $_POST["login"];
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $mdp = $_POST["mdp"];
        $mdp1 = $_POST["mdp1"];
	$adresse = $_POST["adresse"];
	$cp = $_POST["cp"];
	$ville = $_POST["ville"];
	$email = $_POST["email"];
        $admin=0;
	$req = "SELECT Login,Email FROM utilisateur";
    	$result = $this->query($req) or die ($req);
      
     	while($data = $result->fetchColumn()){
	
        
        	if($data== $login || $data== $email)
       		{ 
                	echo 'Login ou email deja existant';
	        } 
		else 
		{
	        	if ($mdp != $mdp1) {
	        	    echo('Les mots de passes ne sont pas identiques');
	        	} 
			else {
	        	    //Cryptage du mot de passe en MD5
        		    $mdp = md5($mdp);
        		    // on crée la requête SQL
        		    $sql = "INSERT INTO utilisateur VALUES('','$login','$mdp','$nom','$prenom','$admin', '$adresse', '$cp', '$ville', '$email')";
        		    // on envoie la requête 
        		    $resultat_requete3 = $this->query($sql) or die($sql);
			    
        		    header('Location: compteValider.php');
        		}
		}
    	}
}

    public function changer_mdp() {
        $mdp = $_POST["mdp"];
        $mdp = md5($mdp);
        $newmdp = $_POST["newmdp"];
        $newmdp1 = $_POST["newmdp1"];

        if ($mdp != $_SESSION['mdp'] || $newmdp != $newmdp1) {
            echo"Erreur de saisie";
        } else {
            $newmdp = md5($newmdp);
            $sql = "UPDATE utilisateur SET MdP='$newmdp' WHERE Login='" . $_SESSION['login'] . "';";
            $resultat_requete5 = $this->query($sql) or die($sql);

            header('Location: index.php');
        }
    }

    public function changerparam(){
    $adresse = $_POST["adresse"];
    $cp = $_POST["cp"];
    $ville = $_POST["ville"];
    $email = $_POST["email"];
}

    public function connexionutil() {

        $login = $_POST["login"];
        $mdp = $_POST["mdp"];
        $mdp = md5($mdp);
        $sql =$this->query("SELECT * FROM utilisateur WHERE Login='$login' AND MdP='$mdp'");
        $nb=$sql->rowCount();
	if($nb>0){
		$result=$sql->fetch();
                if(isset($result["Login"])&& isset($result["MdP"])){
                    $_SESSION['idUtil']=$result['idUtil'];
                    $_SESSION['login'] = $result['Login'];
                    $_SESSION['mdp'] = $result['MdP'];
                    $_SESSION['admin'] = $result['Admin'];
                    header('Location: index.php');
                }
        }
        else{
            echo "Login ou mot de passe incorrect";
        }
    }

    public function ajout_reservation($Date_Sejour, $Date_Fin_Sejour, $Nb_Personnes, $Type_Pension, $menage,$id,$idHeberg) {
        
        $requete = "INSERT INTO `reservation`(`idReserv`, `Date_Arrivee`, `Date_Depart`, `Nb_Personnes`, `Type_pension`, `Menage`, `EtatReservation`, `idUtil`, `idHeberg`)"
                . "VALUES (NULL,'$Date_Sejour','$Date_Fin_Sejour','$Nb_Personnes','$Type_Pension','$menage','demande','$id','$idHeberg')";

        $this->query($requete) or die("TEST erreur est_complet : $requete");
        
        
        
    }
    
        public function hebergementtable(){
        $requete="Select COUNT(*) From hebergement";
        $resultat_requete=$this->query($requete) or die("erreur test2");
        $resultat=$resultat_requete->fetchAll();
        return $resultat;
    }
   
    public function reservationEtat($reservEtat){
        $sql = "SELECT * FROM hebergement h, reservation r,utilisateur u WHERE EtatReservation='".$reservEtat."' and r.idUtil=u.idUtil and r.idHeberg=h.idHeberg ORDER BY idReserv ASC";
        $resultat_reservationEtat = $this->query($sql) or die("erreur est_reserve");
        return $resultat_reservationEtat;
    }
    
    public function miseAjourEtatReserv($newEtat,$idUtil){
        $sql = "UPDATE reservation SET EtatReservation = '".$newEtat."' WHERE idReserv='".$idUtil."'";
        $stmt = $this->prepare($sql);
        $stmt->execute();
    }
    
    public function miseAjourReservAtribuer_heberg($idUtil, $modif) {
        $sql = "SELECT * FROM reservation WHERE idReserv='" . $idUtil . "'";
        $reserv = $this->query($sql);
        foreach ($reserv as $row) {
            $iHeberg = $row["idHeberg"];
        }
        $today = date('Y-m-d');
        
        if ($modif == "insert") {
            $insertTable = "INSERT INTO `attribuer_heberg`(`idReserv`, `idHeberg`, `date_attribution`) VALUES ('" . $idUtil . "','" . $iHeberg . "','" . $today . "')";
            $this->exec($insertTable);
        } else {
            $deleteTable = "DELETE FROM `attribuer_heberg` WHERE idReserv='" . $idUtil . "'";
            $this->exec($deleteTable);
        }
    }

    public function miseAjourNbrHerberg($idUtil,$logement){
        $sql = "SELECT * FROM reservation WHERE idReserv='" . $idUtil . "'";
        $reserv = $this->query($sql);
        foreach ($reserv as $row) {
            $iHeberg = $row["idHeberg"];
        }
        if($logement=='-1'){
            $sql = "UPDATE hebergement SET nbrLogement = nbrLogement-1 WHERE idHeberg='" . $iHeberg . "'";
            $insertlog = $this->prepare($sql);
            $insertlog->execute();
        }  else {
            $sql = "UPDATE hebergement SET nbrLogement = nbrLogement+1 WHERE idHeberg='" . $iHeberg . "'";
            $insertlog = $this->prepare($sql);
            $insertlog->execute();
        }
    }
}