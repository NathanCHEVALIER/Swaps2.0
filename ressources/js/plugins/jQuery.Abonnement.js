(function($) {

    $.fn.Abonnement = function(id){
        this.each(function(){

            var thisObject = this;            
            $content = $('\
                <div class="btn-abo follow" data="' + id +'" >\
                </div>\
                ');

            $(thisObject).append($content);

            $.post("/controllers/controller.php",
                {
                    action: 401,
                    id: id,
                },
                function(data, success){
                    get_etat_abo(data['etat']);
                },
                "json"
            );

            function get_etat_abo(etat){
                $(".btn-abo[data='" + id + "']").removeClass("follow").removeClass("followed").removeClass("unfollow").empty();
                if(etat == 1 || etat == 4){
                    $(".btn-abo[data='" + id + "']").addClass("follow").text("S'abonner");
                }
                else if(etat == 2){
                    $(".btn-abo[data='" + id + "']").addClass("followed").text("Abonné");
                }
                else if(etat == 3){
                    $(".btn-abo[data='" + id + "']").addClass("request").text("Demandé");
                }
            }

            $(".btn-abo").click(function(){
                $.post("/controllers/controller.php",
                    {
                        action: 402,
                        id: id,
                    },
                    function(data, success){
                        get_etat_abo(data['etat']);
                    },
                    "json"
                );
            });

        });
        return this;
    };

    $.fn.Abos = function(data){
        this.each(function(){

            $content = $('\
                    <article class="alignement-1" >\
                        <div style="background-image: url(\'/publicfiles/' + data['id'] + '/profil_' + data['profil'] + '\');">\
                        </div>\
                        <div>\
                            <div>\
                                <span>' + data['pseudo'] + '</span>\
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
                                <p>' + data['description'] + '\
                                </p>\
                            </div>\
                        </div>\
                    </article>\
            ');

            $(this).append($content);

        });
        return this;
    }

})(jQuery);
