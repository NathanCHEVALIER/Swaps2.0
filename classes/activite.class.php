<?php

/*
Classe des publications
Elaboration par Nathan CHEVALIER à partir du 26 Décembre 2016
Dernière modification par Nathan CHEVALIER le 26 Décembre 2016
*/

class Activite
{

	public function set_activite(){
		$manu = 1;
		$titre = htmlspecialchars($_POST['titre']);
        $cat = htmlspecialchars($_POST['categorie']);
        $souscat = htmlspecialchars($_POST['sous_categorie']);
		$lieu = htmlspecialchars($_POST['lieu']);
		$date = htmlspecialchars($_POST['date']);
		$nbparticipants = htmlspecialchars($_POST['participants']);
		$description = htmlspecialchars($_POST['texte']);

		$req = $GLOBALS['bddL7C13']->prepare('INSERT INTO facadisme (factotum, faisandage, fajitas, falafel, fangotherapie, fastigie, fenestron, ferblantier, ferromolybdene, feudataire) VALUES(:auteur, :titre, :descr, :cat, :souscat, :lieu, :nbparticipants, :manu, NOW(), 1)');
		$req->execute(array('auteur' => $_SESSION['user']['id'],
							'titre' => $titre,
							'descr' => $description,
							'cat' => $cat,
							'souscat' => $souscat,
							'lieu' => $lieu,
							'nbparticipants' => $nbparticipants,
							'manu' => $manu,
							));
		$compteur = $req->rowCount();

		if($compteur == 1){
			$id = $GLOBALS['bddL7C13']->lastInsertId();
			return $this->set_activite = array('retour' => true, 'id' => $id);
		}
		else{
			return $this->set_activite = array('retour' => false);
		}
	}

	public function get_activite($type, $info){
		if($type == 1 && $info == null){
			$fil = $GLOBALS['bddL7C13']->prepare('SELECT f.*, d.*
												FROM facadisme f
												INNER JOIN dactyle d
												ON f.factotum = d.dazibao
												WHERE f.feudataire = 1
												ORDER BY f.ferromolybdene DESC');
			$fil->execute();
		}
		elseif($type == 2 && $info != null){
			$fil = $GLOBALS['bddL7C13']->prepare('SELECT f.*, d.*
												FROM facadisme f
												INNER JOIN dactyle d
												ON f.factotum = d.dazibao
												WHERE f.feudataire = 1
												AND f.factotum = :id
												ORDER BY f.ferromolybdene DESC');					
			$fil->execute(array('id' => $info));
		}
		else{

		}
		$retour = array();
		while ($donnees = $fil->fetch()) {
			$retour[] = array("id_auteur" => $donnees['dazibao'], 
							"pseudo_auteur" => $donnees['decapode'], 
							"type_auteur" => $donnees['diatribe'], 
							"profil_auteur" => $donnees['dessication'],
							"id_activite" => $donnees['facetie'],
							"titre_activite" => $donnees['faisandage'],
							"categorie_activite" => $donnees['falafel'],
							"sous_cat_activite" => $donnees['fangotherapie'],
							"description_activite" => $donnees['fajitas'],
							"date_activite" => $donnees['ferromolybdene'],
							"lieu_activite" => $donnees['fastigie'],
							"nbparticipants" => $donnees['fenestron'],
							);
		}
		return $this->get_activite = $retour;
		
	}
	
	public function set_participation($act_id){

		if($this->get_participants(2, $_SESSION['compte']['id'], $act_id) != 0){
			return $this->set_activite = array('retour' => false);
		}

		$req = $GLOBALS['bddL7C13']->prepare('INSERT INTO activity_participants (activityId, participantId, participantState, participationDate) VALUES(:act_id, :par_id, 1, NOW())');
		$req->execute(array('act_id' => $act_id,
							'par_id' => $_SESSION['user']['id']));
		$compteur = $req->rowCount();

		if($compteur == 1){
			$id = $GLOBALS['bddL7C13']->lastInsertId();
			return $this->set_activite = array('retour' => true, 'id' => $id);
		}
		else{
			return $this->set_activite = array('retour' => false);
		}
	}

	public function get_participants($type, $user_id, $act_id){
		if($type == 1 && $user_id === null){
			$req = $GLOBALS['bddL7C13']->prepare('SELECT ap.*, d.*
												FROM activity_participants ap
												INNER JOIN dactyle d
												ON ap.participantId = d.dazibao
												WHERE ap.participantState = 1
												AND ap.activityId = :actId
												ORDER BY ap.participationDate DESC');
			$req->execute(array("actId" => $act_id));

			$retour = array();
			while ($donnees = $req->fetch()) {
				$retour[] = array("id" => $donnees['dazibao'], 
									"pseudo" => $donnees['decapode'], 
									"type" => $donnees['diatribe'], 
									"profil" => $donnees['dessication'],
									);
			}
		}
		elseif($type == 2 && $user_id != null){
			$req = $GLOBALS['bddL7C13']->prepare('SELECT ap.*, d.*
												FROM activity_participants ap
												INNER JOIN dactyle d
												ON ap.participantId = d.dazibao
												WHERE ap.participantState = 1
												AND ap.activityId = :actId
												AND ap.participantId = :userId
												ORDER BY ap.participationDate DESC');					
			$req->execute(array("actId" => $act_id, "userId" => $user_id));

			$req->fetch();
			$retour = $req->rowCount();
		}
		else{

		}
		return $this->get_participants = $retour;
	}
    
}	