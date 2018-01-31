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
                <div>
                    <!--<article class="membercard" size="1" >
                    <div class="moy-profil" style="background-image: url('/publicfiles/1/profil_8cc5a21f8012980c82cd9fcf3ea4e53016cf11a186cf9cbd5019c0efecb63600170718154836.png');"></div>
                    <div>
                        <div>
                            <h3>Pierre Dupont</h3>
                            <q>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id elit nec velit porta laoreet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id elit nec velit porta laoreet. </q>
                        </div>
                        <div>
                            <div class="geopoint">
                                <icon size="30l" ic="geopoint-grey"></icon>
                                Paris, France
                            </div>
                            <div class="valuation">
                                <icon size="30l" ic="valuation-yellow"></icon>
                                4.7 pour 58 votes
                            </div>
                            <div class="pointscounter">
                                <icon size="30l" ic="points-classic"></icon>
                                37895 pts
                            </div>
                        </div>
                        <div>
                            <button class="followmember" >
                                <icon size="30l" ic="follow-red"></icon>
                                S'abonner
                            </button>
                            <button class="followedmember" >
                                <icon size="30l" ic="followed-white"> </icon>
                                Abonné
                            </button>
                        </div>
                    </div>
                </article>-->
                </div>
            </div>
            <div id="dashboard" class="lay-1-1" >
                <div>
                    <div class="lay-1-2-B notification" >
                        <div class="mini-profil" style="background-image: url('/publicfiles/1/profil_8cc5a21f8012980c82cd9fcf3ea4e53016cf11a186cf9cbd5019c0efecb63600170718154836.png');"></div>
                        <div>
                            <div>
                                <span><a href="/membre/pierre.dupont">pierre.dupont</a></span>
                                <span datetime="2017-11-04 18:41:11"> - Il y a 18 jours</span>
                            </div>
                            <div>a publié du contenu</div>
                        </div>
                    </div>
                    <div class="lay-1-2-B notification" >
                        <div class="mini-profil" style="background-image: url('/publicfiles/1/profil_8cc5a21f8012980c82cd9fcf3ea4e53016cf11a186cf9cbd5019c0efecb63600170718154836.png');"></div>
                        <div>
                            <div>
                                <span><a href="/membre/pierre.dupont">pierre.dupont</a></span>
                                <span datetime="2017-11-04 18:41:11"> - Il y a 18 jours</span>
                            </div>
                            <div>a commenté votre publication</div>
                        </div>
                    </div>
                    <div class="lay-1-2-B notification" >
                        <div class="mini-profil" style="background-image: url('/publicfiles/1/profil_8cc5a21f8012980c82cd9fcf3ea4e53016cf11a186cf9cbd5019c0efecb63600170718154836.png');"></div>
                        <div>
                            <div>
                                <span><a href="/membre/pierre.dupont">pierre.dupont</a></span>
                                <span datetime="2017-11-04 18:41:11"> - Il y a 18 jours</span>
                            </div>
                            <div>s'est abonné en retour</div>
                        </div>
                    </div>
                    <div class="lay-1-2-B notification" >
                        <div class="mini-profil" style="background-image: url('/publicfiles/1/profil_8cc5a21f8012980c82cd9fcf3ea4e53016cf11a186cf9cbd5019c0efecb63600170718154836.png');"></div>
                        <div>
                            <div>
                                <span><a href="/membre/pierre.dupont">pierre.dupont</a></span>
                                <span datetime="2017-11-04 18:41:11"> - Il y a 18 jours</span>
                            </div>
                            <div>a publié du contenu</div>
                        </div>
                    </div>
                    <div class="lay-1-2-B notification" >
                        <div class="mini-profil" style="background-image: url('/publicfiles/1/profil_8cc5a21f8012980c82cd9fcf3ea4e53016cf11a186cf9cbd5019c0efecb63600170718154836.png');"></div>
                        <div>
                            <div>
                                <span><a href="/membre/pierre.dupont">pierre.dupont</a></span>
                                <span datetime="2017-11-04 18:41:11"> - Il y a 18 jours</span>
                            </div>
                            <div>a publié du contenu</div>
                        </div>
                    </div>
                    <div class="lay-1-2-B notification" >
                        <div class="mini-profil" style="background-image: url('/publicfiles/1/profil_8cc5a21f8012980c82cd9fcf3ea4e53016cf11a186cf9cbd5019c0efecb63600170718154836.png');"></div>
                        <div>
                            <div>
                                <span><a href="/membre/pierre.dupont">pierre.dupont</a></span>
                                <span datetime="2017-11-04 18:41:11"> - Il y a 18 jours</span>
                            </div>
                            <div>a commenté votre publication</div>
                        </div>
                    </div>
                    <div class="lay-1-2-B notification" >
                        <div class="mini-profil" style="background-image: url('/publicfiles/1/profil_8cc5a21f8012980c82cd9fcf3ea4e53016cf11a186cf9cbd5019c0efecb63600170718154836.png');"></div>
                        <div>
                            <div>
                                <span><a href="/membre/pierre.dupont">pierre.dupont</a></span>
                                <span datetime="2017-11-04 18:41:11"> - Il y a 18 jours</span>
                            </div>
                            <div>s'est abonné en retour</div>
                        </div>
                    </div>
                    <div class="lay-1-2-B notification" >
                        <div class="mini-profil" style="background-image: url('/publicfiles/1/profil_8cc5a21f8012980c82cd9fcf3ea4e53016cf11a186cf9cbd5019c0efecb63600170718154836.png');"></div>
                        <div>
                            <div>
                                <span><a href="/membre/pierre.dupont">pierre.dupont</a></span>
                                <span datetime="2017-11-04 18:41:11"> - Il y a 18 jours</span>
                            </div>
                            <div>a publié du contenu</div>
                        </div>
                    </div>
                    <div class="lay-1-2-B notification" >
                        <div class="mini-profil" style="background-image: url('/publicfiles/1/profil_8cc5a21f8012980c82cd9fcf3ea4e53016cf11a186cf9cbd5019c0efecb63600170718154836.png');"></div>
                        <div>
                            <div>
                                <span><a href="/membre/pierre.dupont">pierre.dupont</a></span>
                                <span datetime="2017-11-04 18:41:11"> - Il y a 18 jours</span>
                            </div>
                            <div>s'est abonné en retour</div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="big-profil" style="background-image: url('/publicfiles/<?php echo $_SESSION['compte']['id']."/profil_".$_SESSION['compte']['profil']; ?>');"></div>
                    <h4><?php echo $_SESSION['compte']['pseudo']; ?></h4>
                </div>
                <div></div>
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
                    <div class="menu-item"><icon size="40" ic="user-follow" /></div>
                    <div class="menu-item"><icon size="40" ic="user-follower" /></div>
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
                <article class="membercard" size="1" >
                    <div class="moy-profil" style="background-image: url('/publicfiles/1/profil_8cc5a21f8012980c82cd9fcf3ea4e53016cf11a186cf9cbd5019c0efecb63600170718154836.png');"></div>
                    <div>
                        <div>
                            <h3>Pierre Dupont</h3>
                            <q>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id elit nec velit porta laoreet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id elit nec velit porta laoreet. </q>
                        </div>
                        <div>
                            <div class="geopoint">
                                <icon size="30l" ic="geopoint-grey"></icon>
                                Paris, France
                            </div>
                            <div class="valuation">
                                <icon size="30l" ic="valuation-yellow"></icon>
                                4.7 pour 58 votes
                            </div>
                            <div class="pointscounter">
                                <icon size="30l" ic="points-classic"></icon>
                                37895 pts
                            </div>
                        </div>
                        <div>
                            <button class="followmember" >
                                <icon size="30l" ic="favori-white"></icon>
                            </button>
                        </div>
                    </div>
                </article>
                <article class="membercard" size="2" >
                    <div class="moy-profil" style="background-image: url('/publicfiles/1/profil_8cc5a21f8012980c82cd9fcf3ea4e53016cf11a186cf9cbd5019c0efecb63600170718154836.png');"></div>
                    <div>
                        <div>
                            <h3>Pierre Dupont</h3>
                            <q>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id elit nec velit porta laoreet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id elit nec velit porta laoreet. </q>
                        </div>
                        <div>
                            <div class="geopoint">
                                <icon size="30l" ic="geopoint-grey"></icon>
                                Paris, France
                            </div>
                            <div class="valuation">
                                <icon size="30l" ic="valuation-yellow"></icon>
                                4.7 pour 58 votes
                            </div>
                            <div class="pointscounter">
                                <icon size="30l" ic="points-classic"></icon>
                                37895 pts
                            </div>
                        </div>
                        <div>
                            <button class="followmember" >
                                <icon size="30l" ic="favori-white"></icon>
                            </button>
                        </div>
                    </div>
                </article>
                <article class="membercard" size="3" >
                    <div class="moy-profil" style="background-image: url('/publicfiles/1/profil_8cc5a21f8012980c82cd9fcf3ea4e53016cf11a186cf9cbd5019c0efecb63600170718154836.png');"></div>
                    <div>
                        <div>
                            <h3>Pierre Dupont</h3>
                            <q>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id elit nec velit porta laoreet. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce id elit nec velit porta laoreet. </q>
                        </div>
                        <div>
                            <div class="geopoint">
                                <icon size="30l" ic="geopoint-grey"></icon>
                                Paris, France
                            </div>
                            <div class="valuation">
                                <icon size="30l" ic="valuation-yellow"></icon>
                                4.7 pour 58 votes
                            </div>
                            <div class="pointscounter">
                                <icon size="30l" ic="points-classic"></icon>
                                37895 pts
                            </div>
                        </div>
                        <div>
                            <button class="followmember" >
                                <icon size="30l" ic="favori-white"></icon>
                            </button>
                        </div>
                    </div>
                </article>
            </aside>
        </section>-->
        <!--
        <section flap="2" id="options" params="false" >
            <aside>
                Paramètres
                <icon size="40r" ic="cross-grey" />
            </aside>
            <aside>
                <article>
                    <div class="geopoint">
                        <icon size="30l" ic="geopoint-grey"></icon>
                        Paris, France
                    </div>
                    <div class="valuation">
                        <icon size="30l" ic="valuation-yellow"></icon>
                        4.7 pour 58 votes
                    </div>
                    <div class="pointscounter">
                        <icon size="30l" ic="points-classic"></icon>
                        37895 pts
                    </div>
                    <button class="followmember" >
                        <icon size="30l" ic="follow-white"></icon>
                    </button>
                    <button class="followmember" >
                        <icon size="30l" ic="followed-white"></icon>
                    </button>
                    <button class="followmember" >
                        <icon size="30l" ic="favori-white"></icon>
                    </button>
                    <button class="airmess-contact" >
                        <icon size="30l" ic="airmess-white"></icon>
                    </button>
                <article>
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
    </body>
</html>