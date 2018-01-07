<?php

    require_once(__DIR__.'/../ressources/php/bdd.php');
    require_once(__DIR__.'/../classes/securite.class.php');
    require_once(__DIR__.'/../classes/support.class.php');
    $securite = new Securite();
    $support = new Support();
    $etatidentification = $securite->identification();

    if($etatidentification === false){
		if(!empty($_GET['page'])){
            $getpage = htmlspecialchars($_GET['page']);
            if($getpage == "contact"){
                $page = "contact.view.php";
            }
            elseif($getpage == "blog"){
                $page = "blog.view.php";
            }
            elseif($getpage == "financement"){
                $page = "financement.view.php";
            }
            elseif($getpage == "presentation"){
                $page = "presentation.view.php";
            }
            elseif($getpage == "sondage"){
                $page = "sondage.view.php";
            }
            else{
                $page = "home.view.php";
            }
        }
        elseif(!empty($_POST['action'])){
            $action = htmlspecialchars($_POST['action']);
            if($action == 1 && !empty($_POST['mail'])){
                //----------Inscription Newsletter
                $email = htmlspecialchars($_POST['mail']);
                $verification_mail = $support->verification_mail($email);
                if($verification_mail === false){
                    $mail_newsletter = $support->mail_newsletter($email);
                    if($mail_newsletter === true){
                        $retour_newsletter = array("etat" => true, "message" => "Vous êtes inscrit à la newsletter, vous allez recevoir un mail de confirmation prochainement");
                        //!!!!!!!!sendmail à inclure
                    }
                    else{
                        $retour_newsletter = array("etat" => false, "message" => "Une erreur s'est produite, veuillez réessayer");
                    }
                }
                else{
                    $retour_newsletter = array("etat" => false, "message" => $verification_mail);
                }
                echo json_encode($retour_newsletter);
                exit();
            }
            elseif($action == 2){
                 //----------Contact
                $email = htmlspecialchars($_POST['mail']);
                $nom = htmlspecialchars($_POST['nom']);
                $objet = htmlspecialchars($_POST['objet']);
                $texte = htmlspecialchars($_POST['texte']);
                $verification_mail = $support->verification_mail($email);
                if($verification_mail === false || $verification_mail === "Vous êtes déjà inscrit à la newsletter"){
                    $mail_newsletter = $support->set_message($email, $nom, $objet, $texte);
                    if($mail_newsletter === true){
                        $retour_newsletter = array("etat" => true, "message" => "Votre message a été envoyé. Nous vous répondrons au plus vite.");
                        //!!!!!!!!sendmail à inclure
                    }
                    else{
                        $retour_newsletter = array("etat" => false, "message" => "Une erreur s'est produite, veuillez réessayer");
                    }
                }
                else{
                    $retour_newsletter = array("etat" => false, "message" => $verification_mail);
                }
                echo json_encode($retour_newsletter);
                exit();
            }
            elseif($action == 3){
                 //----------Sondage
                 $retour = $support->set_sondage();
                 echo json_encode($retour);
                 exit();
            }
            else{

            }
        }
        else{
            $page = "home.view.php";
        }
        require_once(__DIR__.'/../views/fr/support/support.view.php');
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