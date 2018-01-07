<!DOCTYPE html>
<html lang="fr" >
    <head>
        <meta charset="utf-8">
        <title>Swaps</title>
        <meta name="description" content="">
        <meta name="keywords" content="" />
        <meta name="author" content="Nathan CHEVALIER" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="img/xxxx.png" >
        <link rel="stylesheet" href="/ressources/css/style-entete.css">
        <link rel="stylesheet" href="/ressources/css/style-publication.css">
        <link rel="stylesheet" href="/ressources/css/style-membre.css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet"> 
    </head>
    <body>
        <!--Entête-->
        <header>
            <div id="loader">
            </div>
            <div id="menu-btn" >
                <div></div>
                <div></div>
                <div></div>
            </div>
            <form id="search" method="post" action="/recherche" >
                <input placeholder="Rechercher une personne, un service..." size="60px" type="search" name="search-keywords" autocomplete="off" />
                <input type="submit" name="search-btn" value="" />
				<div class="hide">
					Recherche instantannée
				</div>
            </form>
            <div class="mini-profil" style="background-image: url('/publicfiles/<?php echo $_SESSION['user']['id'] . "/profil_" . $_SESSION['user']['profil'];?>');" >
            </div>
        </header>

        <!-- Menu Swaps gauche -->
        <nav id="menu-left" class="close" >
            <ul>
                <li>
                    <a href="/services" >Services</a>
                    <div></div>
                </li>
                <li>
                    <a href="/activites" >Activités</a>
                    <div></div>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="/fil-rouge">Fil rouge</a>
                    <div></div>
                </li>
                <li>
                    <a href="/membre/<?php echo $_SESSION['user']['pseudo'];?>">Mon profil</a>
                    <div></div>
                </li>
                <li>
                    <a href="/abonnements">Mes abonnements</a>
                    <div></div>
                </li>
                <li>
                    <a href="/abonnes">Mes abonnés</a>
                    <div></div>
                </li>
                <!--<li  >
                    <a style="background-image: url('/ressources/images/images/icones/notifications.svg'); background-size: 30px 30px;">Notifications</a>
                </li>
                <li>
                    <a  style="background-image: url('/ressources/images/images/icones/message.svg'); background-size: 30px 30px;" >Messages</a>
                </li>
                <li>
                    <a style="background-image: url('/ressources/images/images/icones/reglage.svg'); background-size: 30px 30px;" >Réglages</a>
                </li>
                <li>
                    <a style="background-image: url('/ressources/images/images/icones/more.svg'); background-size: 30px 30px;" >Autres</a>
                </li>-->
            </ul>
        </nav>

        <nav id="menu-right" class="close">
            <div>
                <div>
                    <div>99</div>
                    <div>Notifications</div>
                </div>
                <div>
                    <div>3</div>
                    <div>Messages</div>
                </div>
                <div>
                    <div style="display: none;" >!</div>
                    <div>Réglages</div>
                </div>
                <div>
                    <div style="display: none;" ></div>
                    <div>Autres</div>
                </div>
                <div>
                </div>
            </div>
            <div class="close">
                <div>
                    <div>
                        <div>
                            <div>
                                <article>
                                    Aucune
                                </article>
                            </div>
                        </div>
                        <div>messagerie indisponible<br /> (c'est la faute à Jules) =)</div>
                        <div>Réglages & options indisponibles</div>
                        <div>Supp.</div>
                    </div>
                </div>
            </div>
        </nav>

        <section>
        </section>

        <script type="text/javascript" >
            var Session = {<?php echo "
                'id' : '".$_SESSION['user']['id']."',
                'pseudo' : '".$_SESSION['user']['pseudo']."',
                'profil' : '".$_SESSION['user']['profil']."',
                ";?>
            };        
        </script>
        <script type="text/javascript" src="/ressources/js/library/jquery.min.js"></script>
        <script type="text/javascript" src="/ressources/js/script-entete.js"></script>
        <script type="text/javascript" src="/ressources/js/script-page.js"></script>
        <script type="text/javascript" src="/ressources/js/plugins/jQuery.Publication.js"></script>
        <script type="text/javascript" src="/ressources/js/plugins/jQuery.relativeDate.js"></script>
        <script type="text/javascript" src="/ressources/js/plugins/jQuery.Membre.js"></script>
        <script type="text/javascript" src="/ressources/js/plugins/jQuery.Page.js"></script>
        <script type="text/javascript" src="/ressources/js/plugins/jQuery.Abonnement.js"></script>
        <script type="text/javascript" src="/ressources/js/plugins/jQuery.Selects.js"></script>
        <script type="text/javascript" src="/ressources/js/plugins/jQuery.Notification.js"></script>
    </body>
</html>