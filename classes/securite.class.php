<?php

/*
Classe de sécurisation (gestion des identifications, autorisations et actions)
Elaboration par Nathan CHEVALIER à partir du 3 Décembre 2016
Dernière modification par Nathan CHEVALIER le 16 Décembre 2016

Modifications possibles:
Session: chiffrer la bdd + compter le nbre erreur au fil de la session + test empty + gestion erreur
*/
session_start();

class Securite
{

    public function creationcookietransmission($ip, $id, $pageact, $time, $cle){
        $var1 = rand(1, 35);
	 	$var2 = rand(1, 35);
	 	$var3 = rand(1, 35);
	 	$var4 = rand(1, 35);
	 	$var5 = rand(1, 35);
	 	$ip = str_replace(':', '', $ip);
	 	$ip = str_replace('.', '', $ip);
	 	$ip = base_convert($var1, 10, 36).base_convert($var2, 10, 36).base_convert((($ip * $var1) + $var2), 10, 36);
	 	$id = base_convert($var3, 10, 36).base_convert($var4, 10, 36).base_convert((($id + $var3) * $var4), 10, 36);
	 	$pageact = bin2hex(utf8_decode($pageact));
	 	
	 	if(strlen($ip) < 16){
	 		$lenght_ip = '0'.dechex(strlen($ip));
	 	}
	 	else{
	 		$lenght_ip = dechex(strlen($ip));
	 	}
		if(strlen($id) < 16){
	 		$lenght_id = '0'.dechex(strlen($id));
	 	}
	 	else{
	 		$lenght_id = dechex(strlen($id));
	 	}
		if(strlen($pageact) < 16){
	 		$lenght_pageact = '0'.dechex(strlen($pageact));
	 	}
	 	else{
	 		$lenght_pageact = dechex(strlen($pageact));
	 	}
 		
        $prefixe = $lenght_ip.$lenght_id.$lenght_pageact;
 		$contenu = substr($cle, 0, 10).$ip.$id.$pageact.$time.substr($cle, 10, 10);
 		$suffixe = base_convert(($prefixe * $var5), 10, 8).base_convert($var5, 10, 36);
		$retour = $prefixe.$contenu.$suffixe;

		setcookie("lang", $retour, time()+60*60*12, "/", "", false, true);
    }

    public function creationsessiontransmission($ip, $id, $pageact, $time, $cle){
        $var1 = rand(1, 15);
	 	$var2 = rand(1, 15);
	 	$var3 = rand(1, 15);
	 	$var4 = rand(1, 15);
	 	$var5 = rand(1, 15);
	 	$ip = str_replace(':', '', $ip);
	 	$ip = str_replace('.', '', $ip);
	 	$ip = base_convert($var1, 10, 16).base_convert($var2, 10, 16).base_convert((($ip * $var1) + $var2), 10, 16);
	 	$id = base_convert($var3, 10, 16).base_convert($var4, 10, 16).base_convert((($id + $var3) * $var4), 10, 16);
        $pageact = bin2hex(utf8_decode($pageact));
	 	
	 	if(strlen($ip) < 16){
	 		$lenght_ip = '0'.dechex(strlen($ip));
	 	}
	 	else{
	 		$lenght_ip = dechex(strlen($ip));
	 	}
		if(strlen($id) < 16){
	 		$lenght_id = '0'.dechex(strlen($id));
	 	}
	 	else{
	 		$lenght_id = dechex(strlen($id));
	 	}
		if(strlen($pageact) < 16){
	 		$lenght_pageact = '0'.dechex(strlen($pageact));
	 	}
	 	else{
	 		$lenght_pageact = dechex(strlen($pageact));
	 	}

 		$prefixe = $lenght_ip.$lenght_id.$lenght_pageact;
 		$contenu = $ip.substr($cle, 0, 5).$id.substr($cle, 5, 5).$pageact.substr($cle, 10, 5).$time.substr($cle, 15, 5);
 		$suffixe = base_convert($var5, 10, 36).base_convert(($prefixe * $var5), 10, 8);
		$retour = $suffixe.$contenu.$prefixe;

		$_SESSION["version"] = $retour;
    }

    public function creationnlbddtransmission($ip, $id, $sessid, $pageact, $time, $cle, $navigateur){
        $ip = str_replace(':', '', $ip);
	 	$ip = str_replace('.', '', $ip);
        $req = $GLOBALS['bdd']->prepare('INSERT INTO xanthelasma(xenarthre, xenolite, xenophobie, xeres, ximenia, xiphophore, xylidine) VALUES(:id, :ip, :sessid, :cle, :page, :timedate, :navigateur)');
        $req->execute(array('id' => $id,
                            'ip' => $ip,
                            'sessid' => $sessid,
                            'cle' => $cle,
                            'page' => $pageact,
                            'timedate' => $time,
                            'navigateur' => $navigateur,
                            ));
        $count = $req->rowCount();      
    }

    public function creationtransmission(){
        $ip = $_SERVER['REMOTE_ADDR'];
        $id = $_SESSION['compte']['id'];
        $sessid = session_id();
        $pageact = $_SERVER['SCRIPT_NAME'];//$_SERVER['REQUEST_URI']
        $navigateur = $_SERVER['HTTP_USER_AGENT'];
        $time1 = date('s').date('i').date('H').date('y').date('m').date('d');
	 	$time2 = date('d').date('m').date('y').date('H').date('i').date('s');
	 	$time3 = date('d').date('H').date('m').date('i').date('y').date('s');
	 	$cle = substr(str_shuffle(bin2hex(openssl_random_pseudo_bytes(150))), 0, 20);

        $this->creationcookietransmission($ip, $id, $pageact, $time1, $cle);
        $this->creationsessiontransmission($ip, $id, $pageact, $time2, $cle);
        $this->creationnlbddtransmission($ip, $id, $sessid, $pageact, $time3, $cle, $navigateur);
    }

    public function verificationcookietransmission(){
        $prefixe = substr($_COOKIE['lang'], 0, 6);
        $suffixe1 = substr($_COOKIE['lang'], -1, 1);
        $suffixe2 = base_convert((base_convert($suffixe1, 36, 10) * $prefixe), 10, 8);
        $lenghtsuffixe2 = strlen($suffixe2);
        $cookie_version = $_COOKIE['lang'];
        str_replace($suffixe2, "", $cookie_version, $countsuffixe);
        if($countsuffixe > 0 ){
            //on mesure le contenu
            $lenghtcontenu = strlen($_COOKIE['lang']) - $lenghtsuffixe2 - 7;
            //on sépare le contenu
            $contenu = substr($_COOKIE['lang'], 6, $lenghtcontenu);
            //On mesure les parties à l'aide du prefixe
            $lenght_ip = base_convert(substr($prefixe, 0, 2), 16, 10); //
            $lenght_id = base_convert(substr($prefixe, 2, 2), 16, 10);
            $lenght_pageact = base_convert(substr($prefixe, 4, 2), 16, 10);
            //Puis on sépare les différentes parties
            $clepart1 = substr($contenu, 0, 10);
            $clepart2 = substr($contenu, -10, 10);
            $ip = substr($contenu, 10, $lenght_ip);
            $id = substr($contenu, (10 + $lenght_ip), $lenght_id);
            $pageact = substr($contenu, (10 + $lenght_id + $lenght_ip), $lenght_pageact);
            $time = substr($contenu, -22, 12);
            //on remet tout dans la convention
            $cle = $clepart1.$clepart2;
            //--IP
            $var1ip = base_convert(substr($ip, 0, 1), 36, 10);
            $var2ip = base_convert(substr($ip, 1, 1), 36, 10);
            $ip = (base_convert(substr($ip, 2), 36,10) - $var2ip) / $var1ip;
            //--ID
            $var1id = base_convert(substr($id, 0, 1), 36, 10);
            $var2id = base_convert(substr($id, 1, 1), 36, 10);
            $id = (base_convert(substr($id, 2), 36,10) / $var2id) - $var1id;
            //--PAGE
            $page = utf8_encode(hex2bin($pageact));
            //--TIME
            $time = substr($time, 10, 2).substr($time, 8, 2).substr($time, 6, 2).substr($time, 4, 2).substr($time, 2, 2).substr($time, 0, 2);
            //On retourne tout dans un tableau
            $retour = array('retour' => true, 'ip' => $ip, 'id' => $id, 'page' => $page, 'time' => $time, 'cle' => $cle);
        }
        else{
            $retour = array('retour' => false);
        }
        return $this->verificationcookietransmission = $retour;
    }

    public function verificationsessiontransmission(){
        $prefixe = substr($_SESSION['version'], -6, 6);
        $suffixe1 = substr($_SESSION['version'], 0, 1);
        $suffixe2 = base_convert((base_convert($suffixe1, 16, 10) * $prefixe), 10, 8);
        $lenghtsuffixe2 = strlen($suffixe2) + 1;
        str_replace($suffixe2, "", $_SESSION['version'], $countsuffixe);
        if($countsuffixe > 0 ){
            //on mesure le contenu
            $lenghtcontenu = strlen($_SESSION['version']) - $lenghtsuffixe2 - 6;
            //on sépare le contenu
            $contenu = substr($_SESSION['version'], $lenghtsuffixe2, $lenghtcontenu);
            //On mesure les parties à l'aide du prefixe
            $lenght_ip = base_convert(substr($prefixe, 0, 2), 16, 10); //
            $lenght_id = base_convert(substr($prefixe, 2, 2), 16, 10);
            $lenght_pageact = base_convert(substr($prefixe, 4, 2), 16, 10);
            //Puis on sépare les différentes parties
            $ip = substr($contenu, 0, $lenght_ip);
            $clepart1 = substr($contenu, $lenght_ip, 5);
            $id = substr($contenu, (5 + $lenght_ip), $lenght_id);
            $clepart2 = substr($contenu, (5 + $lenght_ip + $lenght_id), 5);
            $pageact = substr($contenu, ( - 22 - $lenght_pageact), $lenght_pageact);
            $clepart3 = substr($contenu, -22, 5);
            $time = substr($contenu, -17, 12);
            $clepart4 = substr($contenu, -5, 5);
            //on remet tout dans la convention
            $cle = $clepart1.$clepart2.$clepart3.$clepart4;
            //--IP
            $var1ip = base_convert(substr($ip, 0, 1), 16, 10);
            $var2ip = base_convert(substr($ip, 1, 1), 16, 10);
            $ip = (base_convert(substr($ip, 2), 16,10) - $var2ip) / $var1ip;
            //--ID
            $var1id = base_convert(substr($id, 0, 1), 16, 10);
            $var2id = base_convert(substr($id, 1, 1), 16, 10);
            $id = (base_convert(substr($id, 2), 16,10) / $var2id) - $var1id;
            //--PAGE
            $page = utf8_encode(hex2bin($pageact));
            //--TIME: déjà dans la convention
           //On retourne tout dans un tableau
            $retour = array('retour' => true, 'ip' => $ip, 'id' => $id, 'page' => $page, 'time' => $time, 'cle' => $cle);
        }
        else{
            $retour = array('retour' => false);
        }
        return $this->verificationsessiontransmission = $retour;
    }

    public function verificationbddtransmission(){
        $id = $_SESSION['compte']['id'];
        $sessid = session_id();
        $req = $GLOBALS['bdd']->prepare('SELECT * FROM xanthelasma WHERE xenarthre = :id AND xenophobie = :sessid ORDER BY xanthie DESC LIMIT 1');
        $req->execute(array('id' => $id,
                            'sessid' => $sessid
                            ));
        $count = $req->rowCount();
        if($count > 0 ){
            $donnees = $req->fetch();
            $time = $donnees['xiphophore'];
            $time = substr($time, 0, 2).substr($time, 4, 2).substr($time, 8, 2).substr($time, 2, 2).substr($time, 6, 2).substr($time, 10, 2);
            $retour = array('retour' => true, 'ip' => $donnees['xenolite'], 'id' => $donnees['xenarthre'], 'page' => $donnees['ximenia'], 'time' => $time, 'cle' => $donnees['xeres'], 'navigateur' => $donnees['xylidine']);
        }
        else{
            $retour = array('retour' => false);
        }
        return $this->verificationsessiontransmission = $retour;
    }

    public function verificationtransmission(){
        $cookiedata = $this->verificationcookietransmission();
        $sessiondata = $this->verificationsessiontransmission();
        $bdddata = $this->verificationbddtransmission();
        //On commence le traitement de vérification
        $valide = 0;
        $erreur1 = 0;
        $erreur2 = 0;
        if($cookiedata['retour'] === true && $sessiondata['retour'] === true && $bdddata['retour'] === true){//Tout renvoie des valeurs valides
            //On compte donc les erreurs
	 	    $ip = str_replace(':', '', $_SERVER['REMOTE_ADDR']);
	 	    $ip = str_replace('.', '', $ip);
            if($bdddata['ip'] == $cookiedata['ip'] && $bdddata['ip'] == $sessiondata['ip'] && $bdddata['ip'] == $ip){
                $valide++;
            }
            else{
                $erreur2++;
                echo'ip';
            }
            if($bdddata['id'] == $cookiedata['id'] && $bdddata['id'] == $sessiondata['id'] && $bdddata['id'] == $_SESSION['compte']['id']){
                $valide++;
            }
            else{
                $erreur2++;
            }
            if($bdddata['page'] == $cookiedata['page'] && $bdddata['page'] == $sessiondata['page'] /*&& $bdddata['page'] == $_SERVER['HTTP_REFERER']*/){
                $valide++;
            }
            else{
                $erreur2++;
            }
            if($bdddata['time'] == $cookiedata['time'] && $bdddata['time'] == $sessiondata['time']){
                $valide++;
            }
            else{
                $erreur2++;
            }
            if($bdddata['cle'] == $cookiedata['cle'] && $bdddata['cle'] == $sessiondata['cle']){
                $valide++;
            }
            else{
                $erreur2++;
            }
            if($bdddata['navigateur'] == $_SERVER['HTTP_USER_AGENT']){
                $valide++;
            }
            else{
                $erreur2++;
            }
        }
        else{
            $erreur1++;
        }
        //On comptabilise les erreurs -- les renseigne -- On retourne le résultat de la vérification
        if($erreur1 == 0 || $erreur2 <= 2){
            $retour = true;
        }
        else{
            $retour = false;
        }
        return $this->verificationsessiontransmission = $retour;
    }

    public function supressiontransmission(){
        unset($_SESSION["version"]);
        setcookie("lang", 'eng', time()-3600);
        //Puis on enregistre la fraude dans la bdd
    }

    public function identification(){
        //Création d'un identifiant'
        //$this->creationtransmission($ip, $id, $pageact, $navigateur);
        if(!empty($_SESSION['version']) AND !empty($_COOKIE['lang'])){
            //On vérifie la cle de transmission
            $verificationtransmission = $this->verificationtransmission();
            if($verificationtransmission === true){
                //On recrée un ticket et on renvoie true
                $etat = array('erreur' => false, 'co' => true);
                $this->creationtransmission();
            }
            else{
                $etat = array('erreur' => true, 'co' => false);
            }
        }
        /*elseif(){//Il y a peut-être une reconnexion automatique

            //Si oui système de reconnaissance, puis reconnexion, ouverture session et renvoie true
        }*/
        else{
            //Le visiteur n'est donc pas connecté renvoie false
            $etat = array('erreur' => false, 'co' => false);
        }

        if($etat["erreur"] === true){
            //enregistrement de la fraude
        }
        else{
            //passe ton chemain , tout va bien
        }

        return $this->identification = $etat["co"];
    }

    /**************************************/

    public function verificationupload($size, $name, $tmp_path, $path){
        $error = false;
        $newname = bin2hex(mcrypt_create_iv(32, MCRYPT_DEV_URANDOM)).date('y').date('m').date('d').date('H').date('i').date('s');
        $extension = array("JPG", "PNG", "png", "jpg", "jpeg");
        $maxsize = "5000000"; // 5000000 Octets = 5 MO
        $actualextension = pathinfo($name, PATHINFO_EXTENSION);
        if(empty($name == 0) || empty($size == 0)) {
            $error = array('erreur' => true, 'message' => "Fichier invalide");
        }
        if(file_exists($path.'/'.$newname.'.'.$actualextension)) {
            $error = array('erreur' => true, 'message' => "Fichier invalide");
        }
        if ($size < $maxsize) {
            $error = array('erreur' => true, 'message' => "Fichier trop volumineux");
        }
        if (in_array($actualextension, $extension)) {
            $error = array('erreur' => true, 'message' => "Fichier invalide");
        }
        
        $erreur = false;
        /*$handle = fopen($file['tmp_name'], 'r');
        if ($handle) {
            while (!feof($handle) AND $erreur === false) {
                $buffer = fgets($handle);
                switch (true) {
                    case strstr($buffer,'<'):
                    $erreur = true;
                    break;
                    case strstr($buffer,'>'):
                    $erreur = true;
                    break;
                    case strstr($buffer,';'):
                    $erreur = true;
                    break;
                    case strstr($buffer,'&'):
                    $erreur = true;
                    break;
                    case strstr($buffer,'?'):
                    $erreur = true;
                    break;
                }
            }
        fclose($handle);
        }
        else{
            $error = array('erreur' => true, 'message' => "Fichier invalide");
        }*/

        if(!$error || !$erreur) {
            move_uploaded_file($tmp_path, __DIR__.'/../'.$path.$newname.'.'.$actualextension);
            $retour = array("error" => false, "name" => $newname.'.'.$actualextension);
        }
        else {
            @unlink($path.'/'.$newName.'.'.$extension);
            $retour = array("error" => true, "name" => "");
        }

        return $this->verificationupload = $retour;       

    }

}