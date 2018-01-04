$(function () {

    function include_file(file) {
        var oScript =  document.createElement("script");
        oScript.src = file;
        oScript.type = "text/javascript";
        document.body.appendChild(oScript);
    }

    function target_page(page, supp){
        if(page == "actu"){
            load_actu();
        }
        else if(page == "fil-rouge"){
            $("section").PageFilrouge();
        }
        else if(page == "introduction"){
            load_intro();
        }
        else if(page == "membre"){
            $("section").PageMembre(supp);
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
    }

    function load_current_page(){
        var location = window.location.toString().split("/");
        target_page(location[3], location[4]);
    }

    load_current_page();

    $("a").click(function(){
        var cible = $(this).attr('href');
        var page = cible.toString().split("/");
        target_page(page[1], page[2]);
        return false;
    });

    function load_actu(){
    }

    function load_intro(){
        include_file("/ressources/js/script-introduction.js");
    }

});