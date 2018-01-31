(function($) {

    $.fn.ClickOnLink = function(){
        this.each(function(){
            var cible = $(this).attr('href');
            var page = cible.toString().split("/");
            var pageexist = false;
            $("section").each(function(){
                if( $(this).attr("id") == page[1] && $(this).attr("params") == page[2] ){
                    $("body").DecalWin($(this));
                    pageexist = true;
                }
            });
            if(pageexist == false){
                $("body").CreateWin(page[1], page[2]);
            }
        });
        return this;
    };
 
    $.fn.DecalWin = function($win){
        this.each(function(){
            $("section").removeClass("active").removeClass("open");
            if($win.attr("flap") == "1"){
                $win.addClass("active");
            }
            else{
                for (var i = $win.attr("flap"); i > 0; i--) {
                    $("section[flap='" + i + "']").attr("flap", parseInt(i)+1);
                }
                $win.attr("flap", 1).addClass("open").addClass("active");
            }
        });
        return this;
    };

    $.fn.CreateWin = function(page, param){
        this.each(function(){
            if($("section").length <= 10){
                numberofWin = $("section").length + 1;
                $newWin = $("<section flap='" + numberofWin + "' id='" + page + "' params='" + param + "' ></section>");
                $("nav").after($newWin);
                $("body").DecalWin($newWin);
                $newWin.LoadPage(page, param);
                $newWin = false;
            }
        });
        return this;
    };

    $.fn.LoadPage = function(page, params){
        this.each(function(){
            $(this).html("<aside><icon size='40r' ic='cross-grey' /></aside><aside></aside>");

            if(page == "actu"){
                load_actu();
            }
            else if(page == "fil-rouge"){
                title = "Fil rouge"
                $(this).children("aside:eq(1)").attr("schema", 1).PageFilrouge();
            }
            else if(page == "membre"){
                title = "Membre: " + params;
                $(this).children("aside:eq(1)").PageMembre(params);
            }
            else if(page == "abonnements"){
                $("section").PageAbonnements();
            }
            else if(page == "services"){
                $("section").PageServices();
            }
            else if(page == "activites"){
                $("section").PageActivites();
            }
            else if(page == "abonnes"){
                $("section").PageAbonnes();
            }
            else{
                retour = 2;
            }

            $(this).children("aside:eq(0)").prepend(title);

            $(this).find("aside:eq(0)").not("icon[ic='cross-grey']").click(function(){
                $("body").DecalWin($(this).parent());
                $(this).parent().addClass("open").addClass("active");
                $("#btn-menu").toggleClass("menu-open");
                $("#dashboard").toggleClass("hide");
            });
            
            $(this).find("aside > icon").click(function(){
                currentwin = $(this).parents("section").attr("flap");
                $(this).parents("section").remove();
                for (var i = currentwin; i < 10; i++) {
                    $("section[flap='" + i + "']").attr("flap", i-1);
                }
            })

        });
        return this;
    };

    $.fn.PageFilrouge = function(){
        this.each(function(){
            $("#loader").toggleClass("complet");
            $(this).empty();
            //$(this).publicationEditor();
            var thisObject = this;
            $.post("/controllers/controller.php",
                {
                    action: 102
                },
                function(data, success){
                    for (var i = 0; i < data.length; i++) {
                        $(thisObject).publicationHydrator(data[i]);
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