(function($) {

    $.fn.Notification = function(){
        this.each(function(){

            var thisObject = this;
            $.post("/controllers/controller.php",
                {
                    action: 501
                },
                function(data, success){
                    for (var i = 0; i < data.length; i++) {
                        $(thisObject).NotificationHydrator(data[i]);
                    }
                    /*if(data.length > 0){
                        $(thisObject).children("article:last-of-type()").hide();
	                    $("nav#menu-right > div:eq(0) div:eq(0) > div:eq(0)").text(data.length).show();
                    }
                    else{
                        $(thisObject).children("article:last-of-type()").show();
	                    $("nav#menu-right > div:eq(0) div:eq(0) > div:eq(0)").text('0').hide();
                    }*/
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

            var $notification = $('\
            <div class="lay-1-2-B notification" id="notif_' + data['id'] + '-' + data['texte'] + '-' + data['supp'] + '">\
                <div class="mini-profil" style="background-image: url(\'/publicfiles/' + data['id'] + '/profil_' + data['profil'] + '\');"></div>\
                <div>\
                    <div>\
                        <span><a href="' + data['pseudo'] + '">' + data['pseudo'] + '</a></span>\
                        <span datetime="2017-11-04 18:41:11"> - Il y a 18 jours</span>\
                    </div>\
                    <div>' + textenotif + '</div>\
                </div>\
            </div>');

            $(this).prepend($notification);

            $("#notif_" + data['id'] + "-" + data['texte'] + "-" + data['supp'] + " > div:eq(1) > div > span:eq(1)").relativeDate();

            $("#notif_" + data['id'] + "-" + data['texte'] + "-" + data['supp'] + " > div:eq(1) > div > span:eq(0) > a").click( function(){
                $(this).Navigate("membre", data['pseudo']);
                return false;
            });

        });
        return this;
    };

    $.fn.AlertNotification = function(type, texte){
        this.each(function(){
            
            var $object = null;

            if(type == "warning"){
                $object = $('<div class="alert-warning" >\
                    <icon size="40l" ic="warning-white" ></icon>\
                    ' + texte + '\
                    <icon size="20tr" ic="cross-white" ></icon>\
                </div>');
            }
            else if(type == "error"){
                $object = $('<div class="alert-error" >\
                    <icon size="40l" ic="error-white" ></icon>\
                    ' + texte + '\
                    <icon size="20tr" ic="cross-white" ></icon>\
                </div>');
            }
            else if(type == "success"){
                $object = $('<div class="alert-success" >\
                    <icon size="40l" ic="true-white" ></icon>\
                    ' + texte + '\
                    <icon size="20tr" ic="cross-white" ></icon>\
                </div>');
            }
            else{

            }

            $("#alertsystem").prepend($object);

            $object.children("icon[ic='cross-white']").click( function(){
                 $object.removeClass("show");
    
                setTimeout( function(){
                    $object.remove();
                }, 250);
            });

            setTimeout( function(){
                $object.addClass("show");
            }, 50);

            setTimeout( function(){
                $object.removeClass("show");
            }, 10000);

            setTimeout( function(){
                $object.remove();
            }, 10250);


        });
        return this;
    };

})(jQuery);