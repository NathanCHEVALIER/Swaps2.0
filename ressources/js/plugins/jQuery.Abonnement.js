(function($) {

    $.fn.Abonnement = function(type, id){
        this.each(function(){

            var thisObject = this;            
            $content = $('\
            <button class="btn-abo" size="' + type + '" data="' + id + '">\
                <icon size="30l" ic="favori-white"></icon>\
            </button>');

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
                if(type == 1){
                    if(etat == 1 || etat == 4){
                        $(".btn-abo[data='" + id + "']").html('<icon size="30l" ic="follow-white"></icon>S\'abonner');
                    }
                    else if(etat == 2){
                        $(".btn-abo[data='" + id + "']").html('<icon size="30l" ic="followed-white"></icon>Abonné');
                    }
                    else if(etat == 3){
                        $(".btn-abo[data='" + id + "']").html('<icon size="30l" ic="favori-white"></icon>Demandé');
                    }
                }
                else if(type == 2){
                    if(etat == 1 || etat == 4){
                        $(".btn-abo[data='" + id + "']").html('<icon size="30l" ic="follow-white"></icon>');
                    }
                    else if(etat == 2){
                        $(".btn-abo[data='" + id + "']").html('<icon size="30l" ic="followed-white"></icon>');
                    }
                    else if(etat == 3){
                        $(".btn-abo[data='" + id + "']").html('<icon size="30l" ic="favori-white"></icon>');
                    }
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

})(jQuery);
