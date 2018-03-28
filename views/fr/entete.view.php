<!DOCTYPE html>
<html lang="fr" >
    <head>
        <meta charset="utf-8">
        <title>Swaps</title>
        <meta name="description" content="dehdhdh">
        <meta name="keywords" content="" />
        <meta name="author" content="Nathan CHEVALIER" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="img/xxxx.png" >
        <link rel="stylesheet" href="/ressources/css/style.css">
        <link rel="stylesheet" href="/ressources/css/layout.css">
        <link rel="stylesheet" href="/ressources/css/icon.css">
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet"> 
    </head>
    <body>
        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="600" height="400">
            <defs>
                <filter id="blur" x="0" y="0">
                    <feGaussianBlur in="SourceGraphic" stdDeviation="7" result="blur" />
                    <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 19 -9" result="goo" />
                    <feComposite in="SourceGraphic" in2="goo" operator="atop"/>
                </filter>
            </defs>
        </svg>

        <header>
            <div id="search">
                <input type="search" placeholder="Recherchez par personnes...."/>
                <!--<div>
                </div>-->
            </div>
            <div id="dashboard" class="lay-1-1" >
                <div><!--Emplacement notifications--></div>
                <div>
                    <div class="big-profil" style="background-image: url('/publicfiles/<?php echo $_SESSION['compte']['id']."/profil_".$_SESSION['compte']['profil']; ?>');"></div>
                    <h4><?php echo $_SESSION['compte']['pseudo']; ?></h4>
                </div>
                <div></div>
            </div>
            <div id="options" >
                <div>
                    <icon size="50" ic="options-white" ></icon>
                </div>
            </div>
        </header>

        <nav>
            <div id="btn-menu" class="menu-open">
                <div></div>
                <div></div>
                <div></div>
            </div>
            <div id="btn-user">
                <div>
                    <div class="menu-item"><icon size="40" ic="user-white" /></div>
                    <div class="menu-item"><icon size="40" ic="following-white" /></div>
                    <div class="menu-item"><icon size="40" ic="follower-white" /></div>
                    <div class="menu-toggle"><icon size="50" ic="user-white" /></div>
                </div>
            </div>
            <div id="btn-edit">
                <div>
                    <div class="menu-item"><icon size="40" ic="user" /></div>
                    <div class="menu-item"><icon size="40" ic="user" /></div>
                    <div class="menu-item"><icon size="40" ic="user" /></div>
                    <div class="menu-toggle"><icon size="50" ic="pen-white" /></div>
                </div>
            </div>
        </nav>

        <div id="alertsystem" >
        </div>

        <!--<section flap="2" id="followed" params="false">
            <aside>
                Abonnements
                <icon size="40r" ic="cross-grey" />
            </aside>
            <aside>
                <nav>
                    <li>
                        <icon size="30" ic="grille1-grey"></icon>
                    </li>
                    <li class="selected" >
                        <icon size="30" ic="grille2-grey"></icon>
                    </li>
                    <li>
                        <icon size="30" ic="grille3-grey"></icon>
                    </li>
                    <li>
                    </li>
                </nav>
            </aside>
        </section>-->
        <!--
        <section flap="2" id="options" params="false" >
            <aside>
                Paramètres
                <icon size="40r" ic="cross-grey" />
            </aside>
            <aside>
            </aside>
        </section>-->

        <div id="box" class="">
            <icon size="50tr" ic="cross-white" ></icon>
            <aside>
            </aside>
        </div>
        <script type="text/javascript" >
            var Session = {<?php echo "
                'id' : '".$_SESSION['user']['id']."',
                'pseudo' : '".$_SESSION['user']['pseudo']."',
                'profil' : '".$_SESSION['user']['profil']."',
                ";?>
            };        
        </script>
        <script type="text/javascript" src="/ressources/js/library/jquery.min.js"></script>
        <script type="text/javascript" src="/ressources/js/script.js"></script>
        <script type="text/javascript" src="/ressources/js/plugins/jQuery.Publication.js"></script>
        <script type="text/javascript" src="/ressources/js/plugins/jQuery.relativeDate.js"></script>
        <script type="text/javascript" src="/ressources/js/plugins/jQuery.Membre.js"></script>
        <script type="text/javascript" src="/ressources/js/plugins/jQuery.Navigation.js"></script>
        <script type="text/javascript" src="/ressources/js/plugins/jQuery.Abonnement.js"></script>
        <script type="text/javascript" src="/ressources/js/plugins/jQuery.Selects.js"></script>
        <script type="text/javascript" src="/ressources/js/plugins/jQuery.Notification.js"></script>
        <script type="text/javascript" src="/ressources/js/plugins/jQuery.Activite.js"></script>
    </body>
</html>