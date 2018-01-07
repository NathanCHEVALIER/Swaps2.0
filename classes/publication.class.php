<?php

/*
Classe des publications
Elaboration par Nathan CHEVALIER à partir du 26 Décembre 2016
Dernière modification par Nathan CHEVALIER le 26 Décembre 2016
*/

class Publication
{

	public function set_service($titre, $cat, $souscat, $lieu, $multiple, $contre, $tps, $manu){
		$req = $GLOBALS['bddL7C13']->prepare('INSERT INTO facadisme (factotum, faisandage, falafel, fangotherapie, fastigie, fazenda, feldspathique, fenestron, ferblantier, ferromolybdene, feudataire) VALUES(:auteur, :titre, :cat, :souscat, :lieu, :multiple, :contre, :tps, :manu, NOW(), 1)');
		$req->execute(array('auteur' => $_SESSION['user']['id'],
							'titre' => $titre,
							'cat' => $cat,
							'souscat' => $souscat,
							'lieu' => $lieu,
							'multiple' => $multiple,
							'contre' => $contre,
							'tps' => $tps,
							'manu' => $manu,
							));
		$compteur = $req->rowCount();

		if($compteur == 1){
			$id = $GLOBALS['bddL7C13']->lastInsertId();
			return $this->set_service = array('retour' => true, 'id' => $id);
		}
		else{
			return $this->set_service = array('retour' => false);
		}
	}

	public function get_service($type, $info){
		if($type == 1 && $info == null){
			$fil = $GLOBALS['bddL7C13']->prepare('SELECT f.*, d.*
												FROM facadisme f
												INNER JOIN dactyle d
												ON f.factotum = d.dazibao
												WHERE f.feudataire = 1
												ORDER BY f.ferromolybdene DESC');
			$fil->execute();
		}
		else{

		}
		$retour = array();
		while ($donnees = $fil->fetch()) {
			$retour[] = array("id_auteur" => $donnees['dazibao'], 
							"pseudo_auteur" => $donnees['decapode'], 
							"type_auteur" => $donnees['diatribe'], 
							"profil_auteur" => $donnees['dessication'],
							"id_service" => $donnees['facetie'],
							"titre_service" => $donnees['faisandage'],
							"categorie_service" => $donnees['falafel'],
							"sous_cat_service" => $donnees['fangotherapie'],
							"contrepartie" => $donnees['feldspathique'],
							"tps" => $donnees['fenestron'],
							);
		}
		return $this->get_service = $retour;
		
	}
	
	public function set_publication($type, $public, $texte){
		$ref = null;
		if($type == 2){
            $titre = htmlspecialchars($_POST['service_titre']);
            $cat = htmlspecialchars($_POST['categorie']);
            $souscat = htmlspecialchars($_POST['sous_categorie']);
            $lieu = htmlspecialchars($_POST['departement']);
            $contre = htmlspecialchars($_POST['service_contrepartie']);
            $temps = htmlspecialchars($_POST['service_tps']);             
            $service = $this->set_service($titre, $cat, $souscat, $lieu, 1, $contre, $temps, 1);
			$ref = $service['id'];
        }
        elseif($type == 3){

        }
        else{

        }

		$req = $GLOBALS['bddL7C13']->prepare('INSERT INTO adenoide (alcade, ammonite, ambre, anaerobie, androstone, andoran, angor, anoxie) VALUES(:auteur, :public, NOW(), :texte, null, :ref, :type, 1)');
		$req->execute(array('auteur' => $_SESSION['user']['id'],
							'public' => $public,
							'texte' => $texte,
							'ref' => $ref,
							'type' => $type,
							));
		$compteur = $req->rowCount();

		if($compteur == 1){
			$id = $GLOBALS['bddL7C13']->lastInsertId();
			return $this->set_publication = array('retour' => true, 'id' => $id);
		}
		else{
			return $this->set_publication = array('retour' => false);
		}
	}

	public function get_publication($type, $info){
		if($type == 1 && $info == null){
			$fil = $GLOBALS['bddL7C13']->prepare('SELECT a.*, d.*, c.*
												FROM adenoide a
												INNER JOIN clayette c
												ON a.alcade = c.cocasse
												INNER JOIN dactyle d
												ON a.alcade = d.dazibao
												WHERE ((c.cnidaire = :id
												AND c.coenzine = 1)
												OR a.alcade = :id)
												AND a.anoxie = 1
												ORDER BY a.ambre DESC');
			$fil->execute(array('id' => $_SESSION['user']['id']));
		}
		elseif($type == 2 && is_numeric($info)){
			$fil = $GLOBALS['bddL7C13']->prepare('SELECT a.*, d.*
												FROM adenoide a
												INNER JOIN dactyle d
												ON a.alcade = d.dazibao
												WHERE a.alcade = :id
												AND a.anoxie = 1
												ORDER BY a.ambre DESC');
			$fil->execute(array('id' => $info));
		}
		elseif($type == 3 && is_numeric($info)){
			$fil = $GLOBALS['bddL7C13']->prepare('SELECT a.*, d.*
												FROM adenoide a
												INNER JOIN dactyle d
												ON a.alcade = d.dazibao
												WHERE a.alezan = :id
												AND a.anoxie = 1
												ORDER BY a.ambre DESC');
			$fil->execute(array('id' => $info));
		}
		else{

		}
		$retour = array();
		while ($donnees = $fil->fetch()) {
			$stats = $this->get_stat_publication($donnees['alezan']);
			$retour[] = array("id_auteur" => $donnees['dazibao'], 
							"pseudo_auteur" => $donnees['decapode'], 
							"type_auteur" => $donnees['diatribe'], 
							"profil_auteur" => $donnees['dessication'],
							"id_publication" => $donnees['alezan'], 
							"type_publication" => $donnees['angor'], 
							"texte_publication" => $donnees['anaerobie'], 
							"image_publication" => $donnees['androstone'], 
							"relai_publication" => $donnees['andoran'], 
							"date_publication" => $donnees['ambre'],
							"type_publication" => $donnees['angor'],
							"stats_publication" => $stats,
							);
		}
		return $this->get_publication = $retour;
		
	}

	public function get_stat_publication($id){
		$req = $GLOBALS['bddL7C13']->prepare('SELECT * FROM badin
											WHERE balsamine = :id
											AND benzylique = 1
											ORDER BY brimade DESC');
        $req->execute(array('id' => $id ));

		$nbnotes = 0;
		$cumul = 0;
		$nbcomm = 0;
		$nbrelai = 0;
		$vote = 0;

		while($donnees = $req->fetch()){
			if($donnees['bouquetin'] >= 1 && $donnees['bouquetin'] <= 5){
				if($donnees['bigarade'] == $_SESSION['user']['id']){
					$vote = $donnees['bouquetin'];
				}
				$cumul += $donnees['bouquetin'];
				$nbnotes ++;
			}
			elseif($donnees['bouquetin'] == 6){
				$nbcomm ++;
			}
			elseif($donnees['bouquetin'] == 7){
				$nbrelai ++;
			}
			else{

			}
		}

		if($nbnotes !== 0){
			$moyenne = $cumul / $nbnotes;
		}
		else{
			$moyenne = 0;
		}

		$retour = array("moyenne" => $moyenne, "nbvotes" => $nbnotes, "nbcomm" => $nbcomm, "nbrelai" => $nbrelai, "vote" => $vote);

		return $this->get_stat_publication = $retour;
	}

	public function get_comment($id){
		$req = $GLOBALS['bddL7C13']->prepare('SELECT b.*, d.*
								FROM badin b
								INNER JOIN dactyle d
								ON b.bigarade = d.dazibao
								WHERE b.balsamine = :id_publication
								AND b.bouquetin = 6
								AND b.benzylique = 1
								ORDER BY b.brimade DESC');
		$req->execute(array('id_publication' => $id));

		$tour = 0;
		$comms = array();
		while ($donnees = $req->fetch()){
			$tour ++;
			$comms[] = array("id_auteur" => $donnees['dazibao'],
									"pseudo_auteur" => $donnees['decapode'],
									"profil_auteur" => $donnees['dessication'],
									"date_comm" => $donnees['brimade'],
									"contenu_comm" => $donnees['bryophite'],
								);
		}

		return $this->get_comment = $comms;
	}

	public function set_vote($id, $vote){
		$req = $GLOBALS['bddL7C13']->prepare('SELECT * FROM badin WHERE balsamine = :id1 AND bigarade = :id2 AND bouquetin IN(1, 2, 3, 4, 5) AND benzylique = 1');
		$req->execute(array('id1' => $id,
							'id2' => $_SESSION['user']['id']
							));
		$donnees = $req->fetch();
		$compteur = $req->rowCount();

		if($compteur == 1){
			$req2 = $GLOBALS['bddL7C13']->prepare('UPDATE badin SET bouquetin = :type WHERE balsamine = :id_publication AND bigarade = :id_auteur AND bouquetin IN(1, 2, 3, 4, 5) AND benzylique = 1');
			$req2->execute(array('id_publication' => $id,
								'id_auteur' => $_SESSION['user']['id'],
								'type' => $vote,
								));
			$compteur2 = $req2->rowCount();
		}
		else{
			$req2 = $GLOBALS['bddL7C13']->prepare('INSERT INTO badin (balsamine, bigarade, bouquetin, brimade, benzylique) VALUES(:id_publication, :id_auteur, :type, NOW(), 1)');
			$req2->execute(array('id_publication' => $id,
								'id_auteur' => $_SESSION['user']['id'],
								'type' => $vote,
								));
			$compteur2 = $req2->rowCount();
		}

		$stats = $this->get_stat_publication($id);

		if($compteur2 == 1){
			 $retour = array('retour' => true, 'id' => $id, 'vote' => $vote, 'stats' => $stats);
		}
		else{
			$retour = array('retour' => false, 'id' => $id, 'vote' => $vote, 'stats' => $stats);
		}

		return $this->set_publication = $retour;
	}

	public function set_comment($id, $comment){
		$req = $GLOBALS['bddL7C13']->prepare('INSERT INTO badin(balsamine, bigarade, bouquetin, brimade, bryophite, benzylique) VALUES(:id_publication, :id_auteur, 6, NOW(), :comment, 1)');
		$req->execute(array('id_publication' => $id,
							'id_auteur' => $_SESSION['user']['id'],
							'comment' => $comment));
		$compteur = $req->rowCount();

		$stats = $this->get_stat_publication($id);

		if($compteur == 1){
			$id_comment = $GLOBALS['bddL7C13']->lastInsertId();
			$retour = array('retour' => true, 'id' => $id, 'id_comment' => $id_comment, 'stats' => $stats);
		}
		else{
			$retour = array('retour' => false, 'id' => $id, 'id_comment' => null, 'stats' => $stats);
		}

		return $this->set_comment = $retour;
	}
    
}