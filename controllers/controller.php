<?php

    require_once(__DIR__.'/../ressources/php/bdd.php');
	require_once(__DIR__.'/../classes/membre.class.php');
    require_once(__DIR__.'/../classes/securite.class.php');
    require_once(__DIR__.'/../classes/publication.class.php');
    require_once(__DIR__.'/../classes/notification.class.php');
    $securite = new Securite();
    $membre = new Membre();
    $publication = new Publication();
    $notification = new Notification();
    $etatidentification = $securite->identification();

	if($etatidentification === true && ( !empty($_GET['page']) XOR !empty($_POST['action']) ) ){//Si connection valide + Page demandée OU action demandée
        if(!empty($_GET['page']) && ($_GET['page'] > 0) && ($_GET['page'] < 100)){//Si page demandée et comprise entre 0 et 100 exclus
            $action = htmlspecialchars($_GET['page']);

            if($action == 1){
                require_once(__DIR__.'/../views/fr/entete.view.php');
            }
            else{

            }
        }
        elseif(!empty($_POST['action'])){//Si action demandée
            $action = htmlspecialchars($_POST['action']);

            if(($action >= 100) && ($action < 200)){//Publications
                if($action == 101 && !empty($_POST['public']) && !empty($_POST['option']) && !empty($_POST['texte']) ){//Enregistrement d'une publication
                    $public = htmlspecialchars($_POST['public']);
                    $option = htmlspecialchars($_POST['option']);
                    $texte = htmlspecialchars($_POST['texte']);
                    $image = null;
                    if(!empty($_FILES['pic'])){
                        $image = "";
                        for($i = 0; $i < count($_FILES['pic']['name']) - 1; $i++){
                            $newimg = $securite->verificationupload($_FILES['pic']['size'][$i], $_FILES['pic']['name'][$i], $_FILES['pic']['tmp_name'][$i], "publicfiles/".$_SESSION['compte']['id']."/img_");
                            if($newimg['error'] === false){
                                $image = $image.",".$newimg['name'];
                            }
                        }
                    }
                    $insert = $publication->set_publication($option, $public, $texte, $image);
                    $infos = $publication->get_publication(3, $insert['id']);
                    $retour = array("retour" => $insert['retour'], "infos" => $infos);
                    echo json_encode($retour);
                }
                elseif($action == 102){//Affichage de publications pour fil rouge
                    $retour = $publication->get_publication(1, null);
                    echo json_encode($retour);
                }
                elseif($action == 103 && !empty($_POST['id'])){//Affichage de publications par membre
                    $id = htmlspecialchars($_POST['id']);
                    $retour = $publication->get_publication(2, $id);
                    echo json_encode($retour);
                }
                elseif($action == 110 && !empty($_POST['note']) && !empty($_POST['id']) ){//Vote
                    $id = htmlspecialchars($_POST['id']);
                    $vote = htmlspecialchars($_POST['note']);
                    $retour = $publication->set_vote($id, $vote);
                    echo json_encode($retour);
                }
                elseif($action == 111 && !empty($_POST['comment']) && !empty($_POST['id']) ){//Comment
                    $id = htmlspecialchars($_POST['id']);
                    $comment = htmlspecialchars($_POST['comment']);
                    $retour = $publication->set_comment($id, $comment);
                    echo json_encode($retour);
                }
                elseif($action == 112){

                }
                elseif($action == 113 && !empty($_POST['id'])){
                    $id = htmlspecialchars($_POST['id']);
                    $retour = $publication->get_comment($id);
                    echo json_encode($retour);
                }
                else{

                }
            }
            elseif(($action >= 200) && ($action < 300)){//Activités
                require_once(__DIR__.'/../classes/activite.class.php');
                $activite = new Activite();
                if($action == 200){// set activite
                    $retour = $activite->set_activite();
                    echo json_encode($retour);
                }
                elseif($action == 210){//Get activités
                    $retour = $activite->get_activite(1, null);
                    echo json_encode($retour);
                }
                elseif($action == 211 && !empty($_POST['id']) ){//Get activités par membre
                    $retour = $activite->get_activite(2, htmlspecialchars($_POST['id']));
                    echo json_encode($retour);
                }
                elseif($action == 220 && !empty($_POST['id']) ){//participate in an activity
                    $retour = $activite->set_participation(htmlspecialchars($_POST['id']));
                    echo json_encode($retour);
                }
                elseif($action == 221 && !empty($_POST['id']) ){//participants in an activity
                    $retour = $activite->get_participants(1, null, htmlspecialchars($_POST['id']));
                    echo json_encode($retour);
                }
                else{

                } 
            }
            elseif(($action >= 300) && ($action < 400)){//Services
                if($action == 301){
                }
                elseif($action == 310){
                }
                else{

                }
            }
            elseif(($action >= 400) && ($action < 500)){//Abonnement
                require_once(__DIR__.'/../classes/abonnement.class.php');
                $abonnement = new Abonnement();
                if($action == 401 && !empty($_POST['id'])){
                    $id = htmlspecialchars($_POST['id']);
                    $retour = $abonnement->get_abonnement(1, $id);
                    echo json_encode($retour);
                }
                elseif($action == 402 && !empty($_POST['id'])){
                    $id = htmlspecialchars($_POST['id']);
                    $retour = $abonnement->get_abonnement(1, $id);
                    $abonnement->update_abonnement($retour['etat'], $id);
                    $retour = $abonnement->get_abonnement(1, $id);                    
                    echo json_encode($retour);
                }
                elseif($action == 403){
                    $retour = $abonnement->get_abonnement(2, null);              
                    echo json_encode($retour);
                }
                elseif($action == 404){
                    $retour = $abonnement->get_abonnement(2, null);              
                    echo json_encode($retour);
                }
                elseif($action == 405  && !empty($_POST['id'])){
                    $retour = $abonnement->getSubscriptionByMember(htmlspecialchars($_POST['id']));              
                    echo json_encode($retour);
                }
                else{

                }
            }
            elseif(($action >= 500) && ($action < 600)){//Notifs et recherche
                if($action == 501){
                    $retour = $notification->get_notifications();
                    echo json_encode($retour);
                }
                if($action == 510){
                    $retour = false;
                    echo json_encode($retour);
                }
                else{

                }
            }
            elseif(($action >= 600) && ($action < 700)){//a reprendre (Membre)
                if($action == 610 && !empty($_POST['prenom'])  && !empty($_POST['nom']) && !empty($_POST['description']) && !empty($_POST['adresse']) && !empty($_POST['cp']) && !empty($_POST['ville']) && !empty($_POST['pays']) && !empty($_FILES['profil'])){
                    $infos_actuelles = $membre->getinformations($_SESSION['compte']['id']);
                    $uploadimage = $securite->verificationupload($_FILES['profil'], "publicfiles/".$_SESSION['compte']['id']."/profil_");
                    
                    if(!empty($infos_actuelles) && $uploadimage['error'] === false ){
                        $infos_formulaires = array('decati' => $_POST['nom'],
                                                'depressurier' => $_POST['prenom'],
                                                'dessication' => $uploadimage['name'],
                                                'ecaude' => $_POST['description'],
                                                'echalas' => $_POST['adresse'],
                                                'ecouailles' => $_POST['cp'],
                                                'ectypes' => $_POST['ville'],
                                                'egypan' => $_POST['pays'],
                                                );
                        $retour = $membre->updateinformations($infos_actuelles, $infos_formulaires);
                    }
                    else{
                        $retour = array("type" => false, "message" => "Une erreur est survenue");
                    }
                    echo json_encode($retour);
                }
                elseif($action == 600 && !empty($_POST['pseudo'])){
                    $pseudo = htmlspecialchars($_POST['pseudo']);
                    $retour = $membre->get_membre($pseudo);
                    echo json_encode($retour);
                }
                else{

                }
            }
            else{

            }
            exit();
        }
        else{
            header('Location: /404');
	        exit();
        }
    }
    elseif($etatidentification === false){
        echo 'non connecte';
	}
    else{
		header('Location: /404');
	    exit();
    }

?>