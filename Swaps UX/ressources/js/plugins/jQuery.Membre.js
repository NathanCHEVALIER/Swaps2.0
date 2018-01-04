(function($) {

    $.fn.membreHydrator = function(membre){
        this.each(function(){

            var thisObject = this;
                
            $content = $('\
                <article id="entete_membre" >\
                    <div style="background-image: url(\'/publicfiles/' + membre['id'] + '/couv_' + membre['couv'] + '\');" >\
                    </div>\
                    <div>\
                        <span>' + membre['pseudo'] + '</span>\
                        <div></div>\
                    </div>\
                    <div>\
                        <ul>\
                            <li>Publications (35)</li>\
                            <li>Abonnements (458)</li>\
                            <li>Abonnés (295)</li>\
                            <li>Avis</li>\
                            <li>Informations</li>\
                        </ul>\
                        <span>\
                        </span>\
                        <p>' + membre['description'] + '\
                        </p>\
                    </div>\
                    <div style="background-image: url(\'/publicfiles/' + membre['id'] + '/profil_' + membre['profil'] + '\');">\
                    </div>\
                </article>\
                ');

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
                            $(thisObject).children("article:last-of-type()").publicationHydrator(data[i]);
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
