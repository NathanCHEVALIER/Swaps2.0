<?php

class Abonnement
{

	public function get_abonnement($type, $id){
        if($type == 1){
            $req = $GLOBALS['bddL7C13']->prepare("SELECT * FROM clayette WHERE cnidaire = :id1 AND cocasse = :id2");
            $req->execute(array('id1' => $_SESSION['user']['id'], 'id2' => $id));
            $data = $req->fetch();
            $count = $req->rowCount();

            if($count == 1){
                if($data['coenzine'] == 1){
                    $etat = 2;
                }
                elseif($data['coenzine'] == 2){
                    $etat = 3;
                }
                elseif($data['coenzine'] == 3){
                    $etat = 4;
                }
                else{

                }
            }
            else{
                $etat = 1;
            }
            $retour = array("retour" => true, "etat" => $etat);
        }
        elseif($type == 2){
            $req = $GLOBALS['bddL7C13']->prepare('SELECT d.*, c.*
											FROM clayette c
											INNER JOIN dactyle d
											ON c.cocasse = d.dazibao
											WHERE (c.cnidaire = :id
											AND c.coenzine = 1)
											ORDER BY c.collutoire DESC');
            $req->execute(array('id' => $_SESSION['user']['id']));

            $retour = array();
            while ($donnees = $req->fetch()) {
                $retour[] = array("id" => $donnees['dazibao'], 
                                "pseudo" => $donnees['decapode'], 
                                "type" => $donnees['diatribe'], 
                                "profil" => $donnees['dessication'],
                                );
            }
        }
        else{

        }
        return $this->get_abonnement = $retour;
    }

    public function update_abonnement($etat, $id){
        if($etat == 1){
            $req = $GLOBALS['bddL7C13']->prepare("INSERT INTO clayette(cnidaire, cocasse, cocufier, coenzine, collutoire) VALUES(:id1, :id2, 1, 1, NOW())");
		    $req->execute(array('id1' => $_SESSION['user']['id'], 'id2' => $id));
        }
        elseif($etat == 2){
            $req = $GLOBALS['bddL7C13']->prepare("UPDATE clayette SET coenzine = 3 WHERE cnidaire = :id1 AND cocasse = :id2 AND coenzine = 1");
		    $req->execute(array('id1' => $_SESSION['user']['id'], 'id2' => $id));
        }
        elseif($etat == 4){
            $req = $GLOBALS['bddL7C13']->prepare("UPDATE clayette SET coenzine = 1 WHERE cnidaire = :id1 AND cocasse = :id2 AND coenzine = 3");
		    $req->execute(array('id1' => $_SESSION['user']['id'], 'id2' => $id));
        }
        else{

        }

        return $this->update_abonnement = array("retour" => true);
    }

    public function getSubscriptionByMember($id){
        $req = $GLOBALS['bddL7C13']->prepare("SELECT d.*, c.*
											FROM clayette c
											INNER JOIN dactyle d
											ON c.cocasse = d.dazibao
											WHERE (c.cnidaire = :id
											AND c.coenzine = 1)
											ORDER BY c.collutoire DESC");
        $req->execute(array('id' => $id));
        $retour = array();

        while ($donnees = $req->fetch()) {
            $retour[] = array("id" => $donnees['dazibao'], 
                            "pseudo" => $donnees['decapode'], 
                            "type" => $donnees['diatribe'], 
                            "profil" => $donnees['dessication'],
                            );
        }
       
        return $this->getSubscriptionByMember = $retour;
    }

}