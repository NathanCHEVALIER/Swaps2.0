(function($) {

    $.fn.Notification = function(){
        this.each(function(){

            var thisObject = this;
            $.post("/controllers/controller.php",
                {
                    action: 201
                },
                function(data, success){
                    for (var i = 0; i < data.length; i++) {
                        $(thisObject).children("article:last-of-type()").NotificationHydrator(data[i]);
                    }
                    if(data.length > 0){
                        $(thisObject).children("article:last-of-type()").hide();
	                    $("nav#menu-right > div:eq(0) div:eq(0) > div:eq(0)").text(data.length).show();
                    }
                    else{
                        $(thisObject).children("article:last-of-type()").show();
	                    $("nav#menu-right > div:eq(0) div:eq(0) > div:eq(0)").text('0').hide();
                    }
                },
                "json"
            );

        });
        return this;
    };

    $.fn.NotificationHydrator = function(data){
        this.each(function(){

            var textenotif = data['texte'];
            if(textenotif == 5){
                textenotif = "a publié du contenu";
            }
            else if(textenotif == 6){
                textenotif = "a noté votre publication";
            }
            else if(textenotif == 2){
                textenotif = "s'est abonné";
            }
            else if(textenotif == 8){
                textenotif = "a commenté votre publication";
            }

            var $publication = $('\
                <article class="user-basic-align" >\
                    <div class="mini-profil" style="background-image: url(\'/publicfiles/' + data['id'] + '/profil_' + data['profil'] + '\');" ></div>\
                    <div>\
                        <div>\
                            <h4>' + data['pseudo'] + '</h4>\
                            <h5>- 8 minutes</h5>\
                        </div>\
                        <div>' + textenotif + '</div>\
                    </div>\
                </article >');

            $(this).before($publication);

        });
        return this;
    };

})(jQuery);