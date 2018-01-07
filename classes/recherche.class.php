<?php

/*
Classe Recherche
Elaboration par Nathan CHEVALIER à partir du 23 Décembre 2016
Dernière modification par Nathan CHEVALIER le 23 Décembre 2016
*/

class Recherche
{

    public function recherchesimple($keywords)
    {
        $keywords = $keywords.'%';
        $req = $GLOBALS['bddL7C13']->prepare("SELECT * FROM dactyle WHERE decapode LIKE :pseudo AND dierese = 1");
		$req->execute(array('pseudo' => $keywords));
        while($donnees = $req->fetch()){
            $retour[] = array('id' => $donnees['dazibao'],
                            'type' => $donnees['diatribe'],
                            'pseudo' => $donnees['decapode'],
                            'profil' => $donnees['dessication']
                            );
        }
        if(count($retour) > 0){
             return $this->recherchesimple = $retour;
        }
        else{
             return $this->recherchesimple = false;
        }
    }

}