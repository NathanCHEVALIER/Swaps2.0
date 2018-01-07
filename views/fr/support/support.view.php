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
        <link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,300" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=PT+Sans" type="text/css" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Roboto:400,300" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="body-bg">
            <div id="pre-header" class="container" style="height:130px">
            </div>
            <div id="header">
                <div class="container" >
                    <div class="row" style="height: 300px;" >
                        <div class="logo" id="logo" >
                            <a href="/" title="" >
                                Le réseau d’entraide qui protège votre vie privée !
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="hornav" class="container no-padding">
                <div class="row">
                    <div class="col-md-12 no-padding">
                        <div class="text-center visible-lg">
                            <ul id="hornavmenu" class="nav navbar-nav">
                                <li>
                                    <a href="/" >Home</a>
                                </li>
                                <li>
                                    <a href="/presentation">Présentation</a>
                                </li>
                                <li>
                                    <a href="/blog" >Blog</a>
                                </li>
                                <li>
                                    <a href="/financement" >Financement</a>
                                </li>
                                <li>
                                    <a href="/contact" >Contact</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="post_header" class="container" style="height:30px">
            </div>
            <div id="connect" >
                <div>
                    <div>Inscription</div>
                    <div>Connexion</div>
                </div>
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
            </div>
            <?php
                require_once($page);
            ?>
            <div id="base">
                <div class="container padding-vert-30 margin-top-60">
                    <div class="row">
                        <div class="col-md-4 margin-bottom-20">
                            <h3 class="margin-bottom-10">A propos</h3>
                            <p>
                                © Swaps 2017 - Développé par SD2NC
                                <br>
                            </p>
                        </div>
                        <div class="col-md-3 margin-bottom-20">
                            <h3 class="margin-bottom-10">Remerciements:</h3>
                            <p>
                                Tous les donateurs et Bêta-testeurs
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="/ressources/js/library/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="/ressources/js/library/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="/ressources/js/library/modernizr.custom.js" ></script>
        <script type="text/javascript" src="/ressources/js/script-support.js" ></script>
    </body>
</html>