<?php

/*
Classe Notification
Elaboration par Nathan CHEVALIER à partir du 23 Décembre 2016
Dernière modification par Nathan CHEVALIER le 23 Décembre 2016
*/

class Notification
{

	public function lastviewdate()
	{
		/*$reqlast = $GLOBALS['bddL7C13']->prepare('SELECT * FROM vasiere WHERE venaison = "vue_notification" AND vantose = :id ORDER BY vibrisse DESC LIMIT 0,1');
		$reqlast->execute(array('id' => $_SESSION['id']));
		$donneeslast = $reqlast->fetch();
		$countlast = $reqlast->rowCount();

		if($countlast > 0){
			$last_date = $donneeslast['vibrisse'];
		}
		else{
			$last_date = 0;
		}*/
		return $this->lastviewdate = 0;

	}

    public function notificationsabonne($date)
    {
		$tableau = array();
        $req = $GLOBALS['bddL7C13']->prepare('SELECT d.*, c.*
									FROM dactyle d
									INNER JOIN clayette c
									ON c.cnidaire = d.dazibao
									WHERE c.cocasse = :id 
									AND c.collutoire >= :lastdate');
		$req->execute(array('id' => $_SESSION['user']['id'], 'lastdate' => $date));
        while ($donnees = $req->fetch()){
			if($donnees['coenzine'] == 2){
				$tableau[] = array("id" => $donnees['dazibao'],
									"type" => $donnees['diatribe'],
									"pseudo" => $donnees['decapode'],
									"profil" => $donnees['dessication'],
									"date" => $donnees['collutoire'],
									"texte" => 1);
			}
			elseif($donnees['coenzine'] == 1){
				$tableau[] = array("id" => $donnees['dazibao'],
				                   	"type" => $donnees['diatribe'],
				                	"pseudo" => $donnees['decapode'],
				                    "profil" => $donnees['dessication'],
				                    "date" => $donnees['collutoire'],
				                    "texte" => 2);
			}
			else{
			}
		}
		if(count($tableau) > 0){
			return $this->notificationsabonne = $tableau;
		}
		else{
			return $this->notificationsabonne = false;
		}

    }

	public function notificationsabonnement($date)
    {
		$tableau = array();
		$req = $GLOBALS['bddL7C13']->prepare('SELECT d.*, c.*
									FROM dactyle d
									INNER JOIN clayette c
									ON c.cocasse = d.dazibao
									WHERE c.cnidaire = :id
									AND cephalopode = 2
									AND c.collutoire >= :last_date');
		$req->execute(array('id' => $_SESSION['user']['id'], 'last_date' => $date));
		while ($donnees = $req->fetch()){
			if($donnees['coenzine'] == 1){
				$tableau[] = array("id" => $donnees['dazibao'],
				                    "type" => $donnees['diatribe'],
				                    "pseudo" => $donnees['decapode'],
				                    "profil" => $donnees['dessication'],
				                    "date" => $donnees['collutoire'],
				                    "texte" => 3,
				                    );
			}
			elseif($donnees['coenzine'] == 3){
				$tableau[] = array("id" => $donnees['dazibao'],
				                   	"type" => $donnees['diatribe'],
				                    "pseudo" => $donnees['decapode'],
				                    "profil" => $donnees['dessication'],
				                    "date" => $donnees['collutoire'],
				                    "texte" => 4,
				                    );
			}
			else{
			}
		}
		if(count($tableau) > 0){
			return $this->notificationsabonnement = $tableau;
		}
		else{
			return $this->notificationsabonnement = false;
		}

    }

	public function notificationspublication($date)
    {
		$tableau = array();
		$req = $GLOBALS['bddL7C13']->prepare('SELECT d.*, a.*
									FROM dactyle d
									INNER JOIN adenoide a
									ON a.alcade = d.dazibao
									WHERE a.ammonite = :id 
									AND a.ambre >= :last_date');
		$req->execute(array('id' => $_SESSION['user']['id'], 'last_date' => $date));
		while ($donnees = $req->fetch()){
			$tableau[] = array("id" => $donnees['dazibao'],
				               	"type" => $donnees['diatribe'],
				               	"pseudo" => $donnees['decapode'],
				            	"profil" => $donnees['dessication'],
				                "date" => $donnees['ambre'],
				                "texte" => 5,
				                );
		}
		if(count($tableau) > 0){
			return $this->notificationspublication = $tableau;
		}
		else{
			return $this->notificationspublication = false;
		}
				
    }

	public function notificationsinteractionpublication($date)
    {
		$tableau = array();
		$req = $GLOBALS['bddL7C13']->prepare('SELECT b.*, d.*, a.*
									FROM badin b 
									INNER JOIN dactyle d
									ON d.dazibao = b.bigarade
									INNER JOIN adenoide a
									ON a.alezan = b.balsamine
									WHERE a.alcade = :id
									AND a.anoxie = 1
									AND b.brimade >= :last_date');
		$req->execute(array('id' => $_SESSION['user']['id'], 'last_date' => $date));
		while ($donnees = $req->fetch()){
			if($donnees['bouquetin'] == 5 OR $donnees['bouquetin'] == 6 OR $donnees['bouquetin'] == 7 OR $donnees['bouquetin'] == 8 OR $donnees['bouquetin'] == 9){
				$tableau[] = array("id" => $donnees['dazibao'],
				                    "type" => $donnees['diatribe'],
				                    "pseudo" => $donnees['decapode'],
				                    "profil" => $donnees['dessication'],
				                    "date" => $donnees['brimade'],
				                    "texte" => 6,
				                    );
			}
			elseif($donnees['bouquetin'] == 2){
				$tableau[] = array("id" => $donnees['dazibao'],
				                    "type" => $donnees['diatribe'],
				                    "pseudo" => $donnees['decapode'],
				                    "profil" => $donnees['dessication'],
				                    "date" => $donnees['brimade'],
				                    "texte" => 7,
				                    );
			}
			elseif($donnees['bouquetin'] == 3){
				$tableau[] = array("id" => $donnees['dazibao'],
				                    "type" => $donnees['diatribe'],
				                    "pseudo" => $donnees['decapode'],
				                    "profil" => $donnees['dessication'],
				                    "date" => $donnees['brimade'],
				                    "texte" => 8,
				                    );
			}
			else{
			}
		}
		if(count($tableau) > 0){
			return $this->notificationsinteractionpublication = $tableau;
		}
		else{
			return $this->notificationsinteractionpublication = false;
		}

    }

	public function get_notifications()
	{
		$date = $this->lastviewdate();
        $tableau = $this->notificationsinteractionpublication($date);
    	$tableau1 = $this->notificationsabonne($date);
        $tableau2 = $this->notificationsabonnement($date);
        $tableau3 = $this->notificationspublication($date);
		if($tableau1 !== false){
			foreach($tableau1 as $donnees){
				$tableau[] = array("id" => $donnees['id'],
											"type" => $donnees['type'],
											"pseudo" => $donnees['pseudo'],
											"profil" => $donnees['profil'],
											"date" => $donnees['date'],
											"texte" => $donnees['texte']);                 
			}
		}
		else{

		}
		if($tableau2 !== false){
			foreach($tableau2 as $donnees){
				$tableau[] = array("id" => $donnees['id'],
											"type" => $donnees['type'],
											"pseudo" => $donnees['pseudo'],
											"profil" => $donnees['profil'],
											"date" => $donnees['date'],
											"texte" => $donnees['texte']);                 
			}
		}
		else{

		}
		if($tableau3 !== false){
			foreach($tableau3 as $donnees){
				$tableau[] = array("id" => $donnees['id'],
											"type" => $donnees['type'],
											"pseudo" => $donnees['pseudo'],
											"profil" => $donnees['profil'],
											"date" => $donnees['date'],
											"texte" => $donnees['texte']);                 
			}
		}
		else{

		}
        usort($tableau, function ($a, $b){
			return date_create($b['date']) <=> date_create($a['date']);
		});
		if(count($tableau) > 0){
			return $this->getnotification = $tableau;
		}
		else{
			return $this->getnotification = false;
		}
	}

}