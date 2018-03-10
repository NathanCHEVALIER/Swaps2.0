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
    
}	