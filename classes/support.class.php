<?php

class Support
{
    
    public function verification_mail($email)
    {
        $req = $GLOBALS['bdd']->prepare('SELECT * FROM newsletter WHERE email = :email AND etat = 1');
        $req->execute(array('email' => $email));
        $count = $req->rowCount();
		
		if($count != 0){
			$message_email = "Vous êtes déjà inscrit à la newsletter";
		}
		elseif(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,}$#", $email)){
			$message_email = false;
		}
		else{
			$message_email = "Le mail a un format invalide";
		}
		return $this->verificationemail = $message_email;
    }

    public function mail_newsletter($email)
    {
        $req = $GLOBALS['bdd']->prepare('INSERT INTO newsletter (email, date, etat)VALUES(:email, NOW(), 1)');
        $req->execute(array('email' => $email));
        $count = $req->rowCount();
		
		if($count == 1){
            $message_email = true; 
        }
        else{
			$message_email = false;
		}
		return $this->mail_newsletter = $message_email;
    }

    public function set_message($email, $nom, $objet, $texte)
    {
        $req = $GLOBALS['bdd']->prepare('INSERT INTO messages (email, sujet, nom, texte, date, etat)VALUES(:email, :sujet, :nom, :texte, NOW(), 1)');
        $req->execute(array('email' => $email,
                            'sujet' => $objet,
                            'nom' => $nom,
                            'texte' => $texte
                            ));
        $count = $req->rowCount();
		
		if($count == 1){
            $message_email = true; 
        }
        else{
			$message_email = false;
		}
		return $this->mail_newsletter = $message_email;
    }

    public function set_sondage()
    {
        $ndd1 = 2;
        $ndd2 = 2;
        $ndd3 = 2;
        $ndd4 = 2;
        $ndd5 = 2;

        if(isset($_POST['ndd1'])){
            $ndd1 = 1;
        }
        elseif(isset($_POST['ndd2'])){
            $ndd2 = 1;
        }
        elseif(isset($_POST['ndd3'])){
            $ndd3 = 1;
        }
        elseif(isset($_POST['ndd4'])){
            $ndd4 = 1;
        }
        elseif(isset($_POST['ndd5'])){
            $ndd5 = 1;
        }
        else{

        }

        $req = $GLOBALS['bdd']->prepare('INSERT INTO sondage (q1, q2, q3, q4, q5, ndd1, ndd2, ndd3, ndd4, ndd5, t1, t2, t3, t4, t5, date, ip)VALUES(:q1, :q2, :q3, :q4, :q5, :ndd1, :ndd2, :ndd3, :ndd4, :ndd5, :t1, :t2, :t3, :t4, :t5, NOW(), :ip)');
        $req->execute(array('q1' => $_POST['quest1'],
                            'q2' => $_POST['quest2'],
                            'q3' => $_POST['quest3'],
                            'q4' => $_POST['quest4'],
                            'q5' => $_POST['quest5'],
                            'ndd1' => $ndd1,
                            'ndd2' => $ndd2,
                            'ndd3' => $ndd3,
                            'ndd4' => $ndd4,
                            'ndd5' => $ndd5,
                            't1' => $_POST['textarea1'],
                            't2' => $_POST['textarea2'],
                            't3' => $_POST['textarea3'],
                            't4' => $_POST['textarea4'],
                            't5' => $_POST['textarea5'],
                            'ip' => $_SERVER['REMOTE_ADDR'],
                            ));
        $count = $req->rowCount();
		
		if($count == 1){
            $message_email = true; 
        }
        else{
			$message_email = false;
		}
		return $this->set_sondage = $message_email;
    }

}

?>