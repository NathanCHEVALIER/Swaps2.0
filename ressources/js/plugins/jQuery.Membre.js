(function($) {

    $.fn.membreHydrator = function(membre){
        this.each(function(){

            var thisObject = this;
                
            $content = $('\
                    <article style="background-image: url(\'/publicfiles/' + membre['id'] + '/couv_' + membre['couv'] + '\');" >\
                        <div class="big-profil" style="background-image: url(\'/publicfiles/' + membre['id'] + '/profil_' + membre['profil'] + '\');"></div>\
                        <div>\
                            <h3>' + membre['pseudo'] + '</h3>\
                            <button class="followmember" >\
                                <icon size="30l" ic="follow-white"></icon>\
                            </button>\
                        </div>\
                        <div class="lay-1-1">\
                            <div class="selected" >\
                                <icon size="40" ic="timeline-red"></icon>\
                            </div>\
                            <div>\
                                <icon size="40" ic="activity-grey"></icon>\
                            </div>\
                            <div>\
                                <icon size="40" ic="services-grey"></icon>\
                            </div>\
                            <div>\
                                <icon size="40" ic="avis-grey"></icon>\
                            </div>\
                            <div>\
                                <icon size="40" ic="biography-grey"></icon>\
                            </div>\
                        </div>\
                    </article>\
                    <article class="lay-1-1" >\
                        <div class="lay-3">\
                            <div>\
                                <div>\
                                    <icon size="40l" ic="biography-grey"></icon>\
                                    Bio & infos\
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
                            <div></div>\
                        </div>\
                        <div>\
                        </div>\
                    </article>\
                </aside>\
            </section>');

            $(thisObject).append($content);

            if(membre['id'] != Session.id){
                $("#entete_membre > div:eq(1) > div").Abonnement(membre['id']);
            }

            load_publications_membre(membre['id']);

            function load_publications_membre(id){
                $.post("/controllers/controller.php",
                    {
                        action: 103,
                        id: id,
                    },
                    function(data, success){
                        for (var i = 0; i < data.length; i++) {
                            $(thisObject).find("article:eq(1) > div:eq(1)").publicationHydrator(data[i]);
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

})(jQuery);
