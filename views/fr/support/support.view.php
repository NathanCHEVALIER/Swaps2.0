<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Swaps</title>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <meta name="description" content="">
        <meta name="author" content="Swaps Nathan CHEVALIER">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <link href="favicon.ico" rel="shortcut icon">
        <link rel="stylesheet" href="/ressources/css/bootstrap.css" rel="stylesheet">
        <link rel="stylesheet" href="/ressources/css/style-support.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet"> 
    </head>
    <body>
        <div id="presentation" >

        </div>
        <div id="connect" >
            <div></div>
            <div>
                <div>                    
                    <form action="/inscription/" method="post" id="inscription"  >
						<label for="pseudo"></label>			
						<input class="champ" size="50px" required placeholder="Pseudo" type="text" name="pseudo" />
						<label for="email"></label>
						<input class="champ" size="50px" required placeholder="E-mail" type="email" name="email" />
						<label for="password"></label>
						<input class="champ" size="50px" required placeholder="Mot de passe" type="password" name="password" />
						<label for="passwordrepeat"></label>
						<input class="champ" size="50px" required placeholder="Répétition du mot de passe" type="password" name="passwordrepeat" /> 
						<p>
							<input type="checkbox" name="conf" id="checkbox_conf"/>En m'inscrivant j'accepte les <a target="blank" href="/conditions-generales-d-utilisation">CGU</a> et certifie avoir lu les <a target="blank" href="/regle-de-confidentialitees">règles de confidentialité</a>
						</p>
                           <label for="bouton"></label>
						<input class="bouton_form" type="submit" value="Inscription" />
                    </form>
                    <div>
                        <div>Découvrir</div>
                        <div>S'inscrire</div>
                        <div>Se connecter</div>
                    </div>
                    <form method="post" action="/connexion/" id="connexion">
						<input type="text" name="email" placeholder=" Veuillez saisir votre e-mail" class="champ"></input>
						<input type="password" name="password" placeholder=" Veuillez saisir votre mot de passe" class="champ"></input>
						<p>
							<input type="checkbox" name="co-pers" id="checkbox_conf"/>Maintenir la connexion (risques de sécurité)
						</p>
						<input type="submit" name="bouton" value="Connexion" class="bouton_form"></input>
					</form>
                </div>
            </div>
            <div>
                <span> C - Swaps 2017 </span>
                <span>Politique de confidentialité</span>
                <span> A propos </span>
            </div>
        </div>   
        <script type="text/javascript" src="/ressources/js/library/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="/ressources/js/script-support.js" ></script>
    </body>
</html>