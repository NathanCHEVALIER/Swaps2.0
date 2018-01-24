$(function () {
	
	$("#btn-menu").click(function(){
		$(this).toggleClass("menu-open");
		$("#dashboard").toggleClass("hide");
		$("section.active").toggleClass("open");
	});

	$("header > #search input").on("focus", function(){
		$("#dashboard").addClass("hide");		
	});

	$("header > #search input").on("focusout", function(){
		$("#dashboard").removeClass("hide");		
	});

	$("#btn-edit .menu-toggle").click(function(){
		$(this).parents("#btn-edit").toggleClass("open");
	});

	$("#btn-user .menu-toggle").click(function(){
		$(this).parents("#btn-user").toggleClass("open");
	});

	$("#btn-edit .menu-item").click(function(){
		$("#box").addClass("open");
	});

	$("#box > icon[size='50tr']").click( function(){
		$("#box").removeClass("open");
	})

	$("article.publication icon[ic='comment']").click( function(){
		$(this).parents(".publication").addClass("reverse");
	});

	$("article.publication").find("aside:eq(1) > div > div > div:eq(1) > icon[ic='cross-grey']").click( function(){
		$(this).parents(".publication").removeClass("reverse");
	});

	/******
	 * Navigation
	 */

	$("section > aside > icon").click(function(){
		currentwin = $(this).parents("section").attr("flap");
		$(this).parents("section").remove();
		for (var i = currentwin; i < 10; i++) {
			$("section[flap='" + i + "']").attr("flap", i-1);
		}
	})

	$("section").find("aside:first").not("icon[ic='cross-grey']").click(function(){
		$("section").removeClass("active");
		$(this).parent().addClass("open").addClass("active");
		$("#btn-menu").toggleClass("menu-open");
		$("#dashboard").toggleClass("hide");
		var currentwin = $(this).parent().attr("flap");
		if(currentwin == "1"){

		}
		else{
			for (var i = currentwin; i > 0; i--) {
				$("section[flap='" + i + "']").attr("flap", i+1);
			}
			$(this).parent().attr("flap", 1);
		}
	});

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

});