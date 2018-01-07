$(function () {

	$("#menu-btn").click( function () {
		$(this).toggleClass("menu-open");
		$("#menu-left").toggleClass("close");
	});

	$("header > .mini-profil").click( function () {
		$("#menu-right").toggleClass("close");
		$("#menu-right > div:eq(1)").addClass("close");
		$("#menu-right > div:eq(0) > div").removeClass("open");
	});

	$("#menu-right > div:eq(0) > div").click( function () {
		if($(this).hasClass("open")){
			$(this).removeClass("open");
			$("#menu-right > div:eq(1)").addClass("close");
		}
		else{
			$("#menu-right > div:eq(1)").removeClass("close");
			var submenu = $(this).index();
			$("#menu-right > div:eq(1) > div > div").removeClass();
			$("#menu-right > div:eq(0) > div").removeClass("open");
			$("#menu-right > div:eq(1) > div > div").addClass("submenu"+ submenu);
			$(this).addClass("open");
		}
		$("#menu-right").removeClass("close");
	});

	$("#menu-right > div:eq(0) > div:last-of-type()").click( function () {
		document.location.href = "/deco";
	});

	$("#menu-right > div:eq(1) > div > div > div:eq(0) > div").Notification();
	$("nav#menu-right > div:eq(0) div:eq(0) > div:eq(0)").hide();
	$("nav#menu-right > div:eq(0) div:eq(1) > div:eq(0)").hide();
	$("nav#menu-right > div:eq(0) div:eq(2) > div:eq(0)").hide();
	$("nav#menu-right > div:eq(0) div:eq(3) > div:eq(0)").hide();

	$("#search > input[type='search']").on('focusin', function () {
		$("#search > div").removeClass("hide");
	});

	$("#search > input[type='search']").on('focusout', function () {
		$("#search > div").addClass("hide");
	});


});