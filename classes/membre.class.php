<?php

/*
Classe de gestion des membres (inscription, connexion, affichage, informations...)
Dernière modification par Nathan CHEVALIER le 6 Décembre 2016
*/

class Membre
{

	//Verifications

	public function verificationemail($email){
		$reqemail = $GLOBALS['bddL7C13']->prepare("SELECT * FROM dactyle WHERE desopilant = :email AND diatribe='membre' AND dierese = 1");
		$reqemail->execute(array('email' => $email));
		$existemail = $reqemail->rowCount();
		
		if($existemail != 0){
			$message_email = "Le mail est déjà utilisé";
		}
		elseif(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,}$#", $email)){
			$message_email = false;
		}
		else{
			$message_email = "Le mail a un format invalide";
		}
		return $this->verificationemail = $message_email;
	}

	public function verificationpassword($password){
		if(strlen($password) < 6){
			$message_password = "Le mot de passe a moins de 6 caractères";
		}
		elseif(strlen($password) > 20){
			$message_password = "Le mot de passe a plus de 20 caractères";
		}
		else{
			$message_password = false;
		}
		return $this->verificationpassword = $message_password;
	}

	public function verificationpasswordrepeat($password, $passwordrepeat){
		if($password != $passwordrepeat){
			$message_passwordre = "Les mots de passe sont différents";
		}
		else{
			$message_passwordre = false;
		}
		return $this->verificationpasswordrepeat = $message_passwordre;
	}
	
	public function verificationpseudo($pseudo){
		$reqpseudo = $GLOBALS['bddL7C13']->prepare("SELECT * FROM dactyle WHERE decapode = :pseudo AND diatribe='membre' AND dierese = 1 ");
		$reqpseudo->execute(array('pseudo' => $pseudo));
		$existpseudo = $reqpseudo->rowCount();

		if($existpseudo != 0){
			$message_pseudo = "Le pseudo est déjà utilisé";
		}
		elseif(preg_match("#swaps|swap#i", $pseudo)){
			$message_pseudo = "Le pseudo contient des mots interdits";
		}
		elseif(preg_match("#[^a-zA-Z0-9._-]#", $pseudo)){
			$message_pseudo = "Le pseudo contient des caractère invalides";
		}
		elseif(strlen($pseudo) < 6){
			$message_pseudo = "Le pseudo doit avoir plus de 6 caractères";
		}
		elseif(strlen($pseudo) > 35){
			$message_pseudo = "Le pseudo doit avoir moins de 35 caractères";
		}
		else{
			$message_pseudo = false;
		}
		return $this->verificationpseudo = $message_pseudo;
	}

	public function verificationcleinscription($id, $cle){
		$req = $GLOBALS['bddL7C13']->prepare('SELECT * FROM dactyle WHERE dazibao = :id');
		$req->execute(array('id' => $id));
		$donnees = $req->fetch();

		if($donnees['dierese'] == '1'){
			$message_cle = "Le compte est déjà validé!";
		}
		elseif($cle == $donnees['dichotomie']){
			$message_cle = true;
		}
		else{
			$message_cle = "La clé de validation est érronée";
		}
		return $this->verificationcleinscription = $message_cle;

	}

	//Actions

	public function validation($id){
		$req2 = $GLOBALS['bddL7C13']->prepare("UPDATE dactyle SET dessication = 'base.jpg', diaspora = 'base.jpg', diastole = 1, dierese = 1 WHERE dazibao = :id");
		$req2->execute(array('id' => $id));
		$count2 = $req2->rowCount();
		
		if(!mkdir(__DIR__.'/../publicfiles/'.$id.'', 0777, true)){
			$count3 = 1;
		}
		elseif(!copy( __DIR__.'/../ressources/images/profil_base.jpg', __DIR__.'/../publicfiles/'.$id.'/profil_base.jpg')){
			$count3 = 1;
		}
		elseif(!copy(__DIR__.'/../ressources/images/wallpaper_base.jpg', __DIR__.'/../publicfiles/'.$id.'/couv_base.jpg')){
			$count3 = 1;
		}
		else{
			$count3 = 0;
		}
							
		$req = $GLOBALS['bddL7C13']->prepare('INSERT INTO ebalacon (ebeyliere, ecbase, embut, emissole, empeigne, enferges)VALUES(:id, NOW(), 1, 1, 1, 1)');
		$req->execute(array('id' => $id));
		$count = $req->rowCount();

		$req2 = $GLOBALS['bddL7C13']->prepare('INSERT INTO clayette (cnidaire, cocasse, cocufier, coenzine, collutoire)VALUES(:id, :id, 2, 1, NOW())');
		$req2->execute(array('id' => $id));
		$count4 = $req2->rowCount();

		if($count === 1 && $count2 === 1 && $count3 === 0){
			return $this->validation = true;
		}
		else{
			return $this->validation = "Une erreur inattendue est survenue, merci de réessayer";
		}

	}

	public function connexion($identifiant, $password){
		$count = 0;
		$req = $GLOBALS['bddL7C13']->prepare("SELECT d.*, e.* 
											FROM dactyle d
											INNER JOIN ebalacon e
											ON d.dazibao = e.ebeyliere
											WHERE d.desinence = :password 
											AND ( d.desopilant = :identifiant OR d.decapode =:identifiant )
											AND d.diatribe = 'membre' 
											AND d.dierese = 1");
		$req->execute(array('password' => $password, 'identifiant' => $identifiant));
		$donnees = $req->fetch();
		$count = $req->rowCount();

		if($count == 1){
			return $this->connexion = array('retour' => true, 'valeur' => $donnees['dazibao']);
		}
		else{
			return $this->connexion = array('retour' => false, 'valeur' => null);
		}

	}

	public function cryptpassword($password){
		$var1 = strlen($password);
		$var2 = $var1*21;
		$var3 = $var1*$var1;
		$var4 = $var2 -$var3;
		$var5 = strtoupper($password);
		$var6 = sha1($var5);
		$var7 = md5($password);
		$var8 = $password.$var4;
		$var9 = substr($var8, 3, 7);
		$var10 = sha1($var9);
		$var11 = $var6.$var7.$var10;
		$var12 = substr($var11, 0, $var4);
		$passcrypt = $var12.$var11;

		return $this->cryptpassword = $passcrypt;
	}

	public function inscription($pseudo, $pass, $email, $cle){
		$req = $GLOBALS['bddL7C13']->prepare("INSERT INTO dactyle (decapode, desinence, desopilant, diastole, diatribe, dichotomie, dierese)VALUES(:pseudo, :pass, :email, 1, 'membre', :cle, 0)");
		$req->execute(array('pseudo' => $pseudo,
							'pass' => $pass,
							'email' => $email,
							'cle' => $cle,
							));
		$count = $req->rowCount();
		$id = $GLOBALS['bddL7C13']->lastInsertId();
		if($count == 1){
			return $this->inscription = $id;
		}
		else{
			return $this->inscription = false;
		}
	}

	public function loadsession($id, $id2){
		$req = $GLOBALS['bddL7C13']->prepare("SELECT d.*, e.* 
											FROM dactyle d
											INNER JOIN ebalacon e
											ON d.dazibao = e.ebeyliere
											WHERE d.dazibao = :id
											AND d.diatribe = 'membre' 
											AND d.dierese = 1");
		$req->execute(array('id' => $id));
		$donnees = $req->fetch();

		$_SESSION['compte'] = array('id' => $donnees['dazibao'],
									'pseudo' => $donnees['decapode'],
									'nom' => $donnees['decati'],
									'prenom' => $donnees['depressurier'],
									'email' => $donnees['desopilant'],
									'profil' => $donnees['dessication'],
									'couverture' => $donnees['diaspora'],
									'niveau' => $donnees['diastole'],
									'type' => $donnees['diatribe'],
									'confcontenu' => $donnees['embut'],
									'confabo' => $donnees['emissole'],
									'confcoor' => $donnees['empeigne'],
									'redirection' => $donnees['enferges']
									);

		$req2 = $GLOBALS['bddL7C13']->prepare("SELECT d.*, e.* 
											FROM dactyle d
											INNER JOIN ebalacon e
											ON d.dazibao = e.ebeyliere
											WHERE d.dazibao = :id
											AND d.diatribe = 'membre' 
											AND d.dierese = 1");
		$req2->execute(array('id' => $id2));
		$donnees2 = $req2->fetch();

		$_SESSION['user'] = array('id' => $donnees2['dazibao'],
									'pseudo' => $donnees2['decapode'],
									'nom' => $donnees2['decati'],
									'prenom' => $donnees2['depressurier'],
									'email' => $donnees2['desopilant'],
									'profil' => $donnees2['dessication'],
									'couverture' => $donnees2['diaspora'],
									'niveau' => $donnees2['diastole'],
									'type' => $donnees2['diatribe'],
									'confcontenu' => $donnees2['embut'],
									'confabo' => $donnees2['emissole'],
									'confcoor' => $donnees2['empeigne'],
									'redirection' => $donnees2['enferges']
									);

	}

	// Page membre:

	public function getstatistiques($id){
		$getnbrepub = $GLOBALS['bddL7C13']->prepare("SELECT * FROM adenoide WHERE alcade = :id AND anoxie = 1");
        $getnbrepub->execute(array('id' => $id));
        $nbrepub = $getnbrepub->rowCount();

        $getnbreabo = $GLOBALS['bddL7C13']->prepare("SELECT * FROM clayette WHERE cocasse = :id AND coenzine = 1");
        $getnbreabo->execute(array('id' => $id));
        $nbreabonne = $getnbreabo->rowCount();

        $getnbreabo = $GLOBALS['bddL7C13']->prepare("SELECT * FROM clayette WHERE cnidaire = :id AND coenzine = 1");
        $getnbreabo->execute(array('id' => $id));
        $nbreabonnement = $getnbreabo->rowCount();

		return $this->getstatistiques = array('publications' => $nbrepub, 'abonnes' => $nbreabonne, 'abonnements' => $nbreabonnement);
	}

	public function getmembre($pseudo){
		$verif = $GLOBALS['bddL7C13']->prepare("SELECT d.*, e.* FROM dactyle d INNER JOIN ebalacon e ON d.dazibao = e.ebeyliere WHERE d.decapode = :pseudo AND d.diatribe = 'membre' AND d.dierese = 1");
        $verif->execute(array('pseudo' => $pseudo));
        $datauser = $verif->fetch();
        $count = $verif->rowCount();
        
        if($count == 1){
            if($_SESSION['user']['id'] == $datauser['dazibao']) {
				$corres = true;
			}
			else {
				$corres = false;
			}
			$retour = array('statut' => true, 'personnal' => $corres,/*'' => '', '' => '', '' => '', '' => '', '' => '',*/);
        }
        else{
            $retour = array('statut' => false);
        }

		return $this->getmembre = $retour + $datauser;
	}

	public function get_membre($pseudo){
		$verif = $GLOBALS['bddL7C13']->prepare("SELECT d.*, e.* FROM dactyle d INNER JOIN ebalacon e ON e.ebeyliere = d.dazibao WHERE d.decapode = :pseudo AND d.diatribe = 'membre' AND d.dierese = 1");
        $verif->execute(array('pseudo' => $pseudo));
        $datauser = $verif->fetch();

		$retour = array("id" => $datauser['dazibao'],
						"pseudo" => $datauser['decapode'],
						"nom" => $datauser['decati'],
						"prenom" => $datauser['depressurier'],
						"profil" => $datauser['dessication'],
						"couv" => $datauser['diaspora'],
						"description" => $datauser['ecaude'],
						);
        
        return $this->get_membre = $retour;

	}

	//Informations

	public function getinformations($id){
		$req = $GLOBALS['bddL7C13']->prepare("SELECT d.*, e.* 
											FROM dactyle d
											INNER JOIN ebalacon e
											ON d.dazibao = e.ebeyliere
											WHERE d.dazibao = :id
											AND d.diatribe = 'membre' 
											AND d.dierese = 1");
		$req->execute(array('id' => $id));
		$donnees = $req->fetch();
		return $this->getinformations = $donnees;
	}

	public function updateinformations($array_prec, $array_form){
        foreach($array_form as $key => $value){
			if(empty($value)){
				$array_form[$key] = $array_prec[$key];
			}
			else{
			}
		}
		$array_new = array_merge($array_prec, $array_form);

		$req = $GLOBALS['bddL7C13']->prepare('UPDATE dactyle SET decati = :nom, depressurier = :prenom, dessication = :profil, diaspora = :couverture WHERE dazibao =:id AND diatribe = :type AND dierese = :etat');
		$req->execute(array('nom' => $array_new['decati'],
							'prenom' => $array_new['depressurier'],
							'profil' => $array_new['dessication'],
							'couverture' => $array_new['diaspora'],
							'id' => $array_new['dazibao'],
							'type' => $array_new['diatribe'],
							'etat' => $array_new['dierese']
							));
		$compteur = $req->rowCount();

		if($compteur === 1){
			$retour = array("type" => true, "message" => "");
		}
		else{
			$retour = array("type" => false, "message" => "Une mmmmerreur est survenue");
		}
		return $this->updateinformations = $retour;
	}

	public function saveprofil(){

	}

}