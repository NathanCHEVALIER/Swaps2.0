$(function () {
	
	$("#btn-menu").click(function(){
		$(this).toggleClass("menu-open");
		$("#dashboard").toggleClass("hide");
		$("body").find("section.active").toggleClass("open");
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

	/******
	 * Navigation
	 */

	$("body").CreateWin("fil-rouge", false);

	/*
	function load_current_page(){
        var location = window.location.toString().split("/");

	}

    //load_current_page();*/

});