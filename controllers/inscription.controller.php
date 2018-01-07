<?php

    require_once(__DIR__.'/../ressources/php/bdd.php');
	require_once(__DIR__.'/../classes/membre.class.php');
    require_once(__DIR__.'/../classes/securite.class.php');
    $securite = new Securite();
    $membre = new Membre();
    $etatidentification = $securite->identification();

    if($etatidentification === false){
        if(!empty($_POST['action'])){//Vérifications AJAX
            $action = htmlentities($_POST['action']);
            $retourjson = array();

            if($action == 1){
                $pseudo = $_POST['pseudo'];
                $retourjson["erreur"] = $membre->verificationpseudo($pseudo);
                echo json_encode($retourjson);
                exit();
            }
            elseif($action == 2){
                $email = $_POST['email'];
                $retourjson["erreur"] = $membre->verificationemail($email);
                echo json_encode($retourjson);
                exit();
            }
            elseif($action == 3 && !empty($_POST['email']) AND !empty($_POST['pseudo']) AND !empty($_POST['password']) AND !empty($_POST['passwordrepeat']) AND $_POST['conf'] == true){//Inscription du membre
                $email = htmlentities($_POST['email']);
                $pseudo = htmlentities($_POST['pseudo']);
                $password = htmlentities($_POST['password']);
                $passwordrepeat = htmlentities($_POST['passwordrepeat']);

                $erreurpseudo = $membre->verificationpseudo($pseudo);
                $erreuremail = $membre->verificationemail($email);
                $erreurpass = $membre->verificationpassword($password);
                $erreurpassrepeat = $membre->verificationpasswordrepeat($password, $passwordrepeat);

                if($erreurpseudo === false && $erreuremail === false && $erreurpass === false && $erreurpassrepeat === false){
                    $cle = md5(microtime(TRUE)*100000);
                    $cryptedpassword = $membre->cryptpassword($password);
                    $idretour = $membre->inscription($pseudo, $cryptedpassword, $email, $cle);
                    if($idretour === false){
                        $messagetemplate = array('type' => false, 'message' => "Un problème inattendu est survenu, merci de bien vouloir réessayer");
                    }
                    else{
                        /*require_once(__DIR__.'/../ressources/sendmail/ins-fr.php');
                        include_once(__DIR__.'/../ressources/sendmail/goldmaster.php');*/
                        $messagetemplate = array('type' => true, 'message' => "<p>Un mail de confirmation vient de vous être envoyé à l'adresse: ".$email."</p>");
                    }
                }
                elseif($erreurpseudo !== false){
                    $messagetemplate = array('type' => false, 'message' => $erreurpseudo);
                }
                elseif($erreuremail !== false){
                    $messagetemplate = array('type' => false, 'message' => $erreuremail);
                }
                elseif($erreurpass !== false){
                    $messagetemplate = array('type' => false, 'message' => $erreurpass);
                }
                elseif($erreurpassrepeat !== false){
                    $messagetemplate = array('type' => false, 'message' => $erreurpassrepeat);
                }
                else{
                $messagetemplate = array('type' => false, 'message' => "Un problème inattendu est survenu, merci de bien vouloir réessayer");
                }
            }
            elseif($action == 3 && !empty($_POST['email']) AND !empty($_POST['pseudo']) AND !empty($_POST['password']) AND !empty($_POST['passwordrepeat']) AND $_POST['conf'] != true)//Erreur CGU
            {
                $messagetemplate = array('type' => false, 'message' => "Vous devez accepter les CGU et autres règles");
            }
            else{
                $messagetemplate = array('type' => false, 'message' => "Une erreur est survenue, veuillez réessayer");
            }
        }
        elseif($_GET['type'] == "active")//Activation du compte
        {
            $id = htmlentities($_GET['id']);
            $cle = htmlentities($_GET['cle']);
            $verificationcle = $membre->verificationcleinscription($id, $cle);
            if($verificationcle === true){
                $validationmembre = $membre->validation($id);
                if($validationmembre === true){
                    $messagetemplate = array('type' => true, 'message' => "Votre compte à été activé");
                    $membre->loadsession($id, $id);
                    $securite->creationtransmission();
                    header('Location: /introduction/');
                    exit();
                }
                else{
                    $messagetemplate = array('type' => false, 'message' => $validationmembre);
                }
            }
            else{
                $messagetemplate = array('type' => false, 'message' => $verificationcle);
            }
        }
        else//Afficher formulaire normalement
        {
            $messagetemplate = array('type' => false, 'message' => "Veuillez remplir le formulaire");
        }
        echo json_encode($messagetemplate);
        exit();
    }
    elseif($etatidentification === true){
        header('Location: /actu');
	    exit();
    }
    else{
		header('Location: /404');
	    exit();
    }

?>