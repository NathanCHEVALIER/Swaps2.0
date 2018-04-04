(function($) {

    $.fn.membreHydrator = function(membre){
        this.each(function(){

            var thisObject = this;
                
            $content = $('\
                    <article id="membre_' + membre['id'] + '" style="background-image: url(\'/publicfiles/' + membre['id'] + '/couv_' + membre['couv'] + '\');" >\
                        <div class="big-profil" style="background-image: url(\'/publicfiles/' + membre['id'] + '/profil_' + membre['profil'] + '\');"></div>\
                        <div>\
                            <h3>' + membre['pseudo'] + '</h3>\
                        </div>\
                        <div class="lay-1-1">\
                            <div>\
                                <icon size="40" ic="timeline-grey"></icon>\
                            </div>\
                            <div>\
                                <icon size="40" ic="activity-grey"></icon>\
                            </div>\
                            <div>\
                                <icon size="40" ic="services-grey"></icon>\
                            </div>\
                            <div>\
                                <icon size="40" ic="follower-grey"></icon>\
                            </div>\
                            <div>\
                                <icon size="40" ic="following-grey"></icon>\
                            </div>\
                            <div></div>\
                        </div>\
                    </article>\
                    <article class="lay-1-1" >\
                        <div>\
                            <div>\
                                <div>\
                                    <icon size="40l" ic="biography-grey"></icon>\
                                    A propos de ' + membre['pseudo'] + '\
                                </div>\
                                <div>\
                                    ' + membre['description'] + '\
                                    <div class="geopoint">\
                                        <icon size="30l" ic="geopoint-grey"></icon>\
                                        Paris, France\
                                    </div>\
                                    <div class="valuation">\
                                        <icon size="30l" ic="valuation-yellow"></icon>\
                                        4.7 pour 58 votes\
                                    </div>\
                                    <div class="pointscounter">\
                                        <icon size="30l" ic="points-classic"></icon>\
                                        37895 pts\
                                    </div>\
                                </div>\
                            </div>\
                        </div>\
                        <div>\
                            <div></div>\
                            <div></div>\
                            <div></div>\
                            <div></div>\
                        </div>\
                    </article>\
                </aside>\
            </section>');

            $(thisObject).append($content);

            $("#membre_" + membre['id'] + " > div:eq(2) > div").click( function(){
                var childrenNumber = $(this).index();
                var decalage = childrenNumber * ($(this).parent().width() / 5);
                $(this).parent().children("div:eq(5)").css("transform", "translateX(" + decalage + "px)");
                $(this).parents("aside").find("article:eq(1) > div:eq(1) > div").hide().parent().children("div:eq(" + childrenNumber + ")").show();
            });

            $("#membre_" + membre['id'] + " > div:eq(2) > div").mouseenter( function(){
                //$(this).addClass("hover");
            });

            if(membre['id'] != Session.id){
                $("#membre_" + membre['id'] + " > div:eq(1)").Abonnement(membre['id']);
            }

            load_publications_membre(membre['id']);            
            load_activite_membre(membre['id']);            
            load_abonnements_membre(membre['id']);

            function load_publications_membre(id){
                $.post("/controllers/controller.php",
                    {
                        action: 103,
                        id: id,
                    },
                    function(data, success){
                        for (var i = 0; i < data.length; i++) {
                            $(thisObject).find("article:eq(1) > div:eq(1) > div:eq(0)").publicationHydrator(data[i]);
                        }
                    },
                    "json"
                );
            }

            function load_activite_membre(id){
                $.post("/controllers/controller.php",
                    {
                        action: 211,
                        id: id,
                    },
                    function(data, success){
                        for (var i = 0; i < data.length; i++) {
                            $(thisObject).find("article:eq(1) > div:eq(1) > div:eq(1)").ActiviteHydrator(data[i]);
                        }
                    },
                    "json"
                );
            }

            function load_abonnements_membre(id){
                $.post("/controllers/controller.php",
                    {
                        action: 405,
                        id: id,
                    },
                    function(data, success){
                        for (var i = 0; i < data.length; i++) {
                            $(thisObject).find("article:eq(1) > div:eq(1) > div:eq(3)").MemberCard(data[i]);
                        }
                    },
                    "json"
                );
            }

        });
        return this;
    };

    $.fn.InfosMembre = function(publication){
        this.each(function(){
            console.log("infosmembre-");
        });
        return this;
    };

    $.fn.MemberCard = function(data, type){
        this.each(function(){

            if(type == 1){
                $content = $('\
                <article class="membercard" data="' + data['id'] + '" size="2" >\
                    <div class="lay-1-2-A" >\
                        <div class="mini-profil" style="background-image: url(\'/publicfiles/' + data['id'] + '/profil_'  + data['profil'] + '\');">\
                        </div>\
                        <div>\
                            <div>\
                                <span><a href="/membre/' + data['pseudo'] + '">' + data['pseudo'] + '</a></span>\
                            </div>\
                        </div>\
                    </div>\
                    <div>\
                    </div>\
                </article>');

                $(this).append($content);
                $($content).children("div:eq(1)").Abonnement(2, data['id']);
                //$('.membercard[size="2"][data="' + data['id'] + '"] > div:eq(1)').Abonnement(2, data['id']);
            }
            else if(type == 2){
                $content = $('\
                <article class="membercard" data="' + data['id'] + '" size="1" >\
                    <div class="moy-profil" style="background-image:  url(\'/publicfiles/' + data['id'] + '/profil_' + data['profil'] + '\');"></div>\
                    <div>\
                        <div>\
                            <h3>' + data['pseudo'] + '</h3>\
                            <q>' + data['description'] + '</q>\
                        </div>\
                        <div>\
                            <div class="geopoint">\
                                <icon size="30l" ic="geopoint-grey"></icon>\
                                Paris, France\
                            </div>\
                            <div class="valuation">\
                                <icon size="30l" ic="valuation-yellow"></icon>\
                                4.7 pour 58 votes\
                            </div>\
                            <div class="pointscounter">\
                                <icon size="30l" ic="points-classic"></icon>\
                                37895 pts\
                            </div>\
                        </div>\
                        <div>\
                        </div>\
                    </div>\
                </article>');

                $(this).append($content);

                $('.membercard[size="1"][data="' + data['id'] + '"] > div:eq(1) > div:eq(2)').Abonnement(2, data['id']);
            }

        });
        return this;
    }

})(jQuery);
