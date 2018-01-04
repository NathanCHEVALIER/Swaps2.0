(function($) {

    $.fn.PageFilrouge = function(){
        this.each(function(){
            $("#loader").toggleClass("complet");
            $(this).empty();
            $(this).publicationEditor();
            var thisObject = this;
            $.post("/controllers/controller.php",
                {
                    action: 102
                },
                function(data, success){
                    for (var i = 0; i < data.length; i++) {
                        $(thisObject).children("article:last-of-type()").publicationHydrator(data[i]);
                    }
                    history.pushState({ path: this.path }, '', '/fil-rouge');
                    $("#loader").removeClass("complet");
                },
                "json"
            );
        });
        return this;
    };

    $.fn.PageMembre = function(pseudo){
        this.each(function(){
            $("#loader").toggleClass("complet");
            $(this).empty();
            var thisObject = this;
            $.post("/controllers/controller.php",
                {
                    action: 310,
                    pseudo: pseudo,
                },
                function(data, success){
                    $(thisObject).membreHydrator(data);
                    history.pushState({ path: this.path }, '', '/membre/' + pseudo);
                    $("#loader").removeClass("complet");
                },
                "json"
            );
        });
        return this;
    };

    $.fn.PageAbonnements = function(pseudo){
        this.each(function(){
            $("#loader").toggleClass("complet");
            $(this).empty();
            var thisObject = this;
            $.post("/controllers/controller.php",
                {
                    action: 403,
                },
                function(data, success){
                    for (var i = 0; i < data.length; i++) {
                        $(thisObject).Abos(data[i]);
                    }
                    history.pushState({ path: this.path }, '', '/abonnements');
                    $("#loader").removeClass("complet");
                },
                "json"
            );
        });
        return this;
    };

    $.fn.PageAbonnes = function(pseudo){
        this.each(function(){
            $("#loader").toggleClass("complet");
            $(this).empty();
            var thisObject = this;
            $.post("/controllers/controller.php",
                {
                    action: 404,
                },
                function(data, success){
                    for (var i = 0; i < data.length; i++) {
                        alert('abos');
                        //$(thisObject).Abos(data[i]);
                    }
                    history.pushState({ path: this.path }, '', '/abonnes');
                    $("#loader").removeClass("complet");
                },
                "json"
            );
        });
        return this;
    };

    $.fn.PageServices = function(pseudo){
        this.each(function(){
            $("#loader").toggleClass("complet");
            var thisObject = this;
            $(thisObject).empty();            
            var $menu = $('\
                <nav>\
                    <ul>\
                        <li>Tout les services</li>\
                        <li>Vos services</li>\
                        <li>Services de vos abonnés</li>\
                    </ul>\
                </nav>');
            $(thisObject).prepend($menu);
            
            $.post("/controllers/controller.php",
                {
                    action: 501,
                },
                function(data, success){
                    for (var i = 0; i < data.length; i++) {
                        $(thisObject).ServiceHydrator(data[i]);
                    }
                    history.pushState({ path: this.path }, '', '/services');
                    $("#loader").removeClass("complet");
                },
                "json"
            );
        });
        return this;
    };

    $.fn.PageActivites = function(pseudo){
        this.each(function(){
            $("#loader").toggleClass("complet");
            $(this).empty();
            var thisObject = this;
            $.post("/controllers/controller.php",
                {
                    action: 404,
                },
                function(data, success){
                    for (var i = 0; i < data.length; i++) {
                        alert('activites indispo');
                        //$(thisObject).Abos(data[i]);
                    }
                    history.pushState({ path: this.path }, '', '/activites');
                    $("#loader").removeClass("complet");
                },
                "json"
            );
        });
        return this;
    };
    
})(jQuery);