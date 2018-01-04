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

	$("article.publication icon[ic='comment']").click( function(){
		$(this).parents(".publication").addClass("reverse");
	});

	$("article.publication").find("aside:eq(1) > div > div > div:eq(1) > icon[ic='cross-grey']").click( function(){
		$(this).parents(".publication").removeClass("reverse");
	});



});