<?php

    require_once(__DIR__.'/../ressources/php/bdd.php');
	require_once(__DIR__.'/../classes/membre.class.php');
    require_once(__DIR__.'/../classes/securite.class.php');
    $securite = new Securite();
    $membre = new Membre();
    $etatidentification = $securite->identification();

    if($etatidentification === false){
        if(!empty($_POST['email']) AND !empty($_POST['password'])){
            $identifiant = htmlentities($_POST['email']);
            $password = htmlentities($_POST['password']);

            $cryptedpassword = $membre->cryptpassword($password);
            $connexion = $membre->connexion($identifiant, $cryptedpassword);
            if($connexion['retour'] === true){
                $membre->loadsession($connexion['valeur'], $connexion['valeur']);
                $securite->creationtransmission();
                header('Location: /fil-rouge');
	            exit();
            }
            else{
                $messagetemplate = array('type' => 0, 'message' => "Les identifiants ne correspondent pas");
            }
        }
        else//Afficher formulaire normalement
        {
            $messagetemplate = array('type' => 0, 'message' => "Veuillez remplir le formulaire");
        }
    }
    elseif($etatidentification === true){
        if($_GET['type'] = 'deco'){
            $securite->supressiontransmission();
            header('Location: /');
            exit();
        }
        else{
            header('Location: /fil-rouge');
            exit();
        }
    }
    else{
        header('Location: /404');
	    exit();
    }

?>