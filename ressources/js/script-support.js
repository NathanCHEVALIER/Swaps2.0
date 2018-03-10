$(function () {

	$("label").hide();

	var erreurpassre = 0;
	var erreurpass = 0;
	var erreurpseudo = 0;
	var erreurmail = 0;
	var erreurcheckbox = 0;

    $("#inscription > input[name='pseudo']").on("change paste keyup", function(){
    	var pseudo = $(this).val();
		$.post("/controllers/inscription.controller.php", 
			{pseudo: pseudo, action: 1},
			function(data){
				if(data.erreur == false){
					$("#inscription > label[for='pseudo']").hide();
					erreurpseudo = 0;
				}
				else{
					$("#inscription > label[for='pseudo']").show().text(data.erreur);
					erreurpseudo = 1;
				}
			},
			"json"
		);
	});

	$("#inscription > input[name='email']").on("change paste keyup", function(){
		var email = $(this).val();
		$.post("/controllers/inscription.controller.php", 
			{email: email, action: 2},
			function(data){
				if(data.erreur == false){
					$("#inscription > label[for='email']").hide();
					erreurmail = 0;
				}
				else{
					$("#inscription > label[for='email']").show().text(data.erreur);
					erreurmail = 1;
				}
			},
			"json"
		);
	});
			
	$("#inscription > input[name='password']").on("change paste keyup", function(){
		var password = $(this).val().length;
		if(password < 6){
			$("#inscription > label[for='password']").show().text("Le mot de passe a moins de 6 caractères");
			erreurpass = 1;
		}
		else if(password > 20){
			$("#inscription > label[for='password']").show().text("Le mot de passe a plus de 20 caractères");
			erreurpass = 1;
		}
		else{
			$("#inscription > label[for='password']").hide();
			erreurpass = 0;
    	}
	});

	$("#inscription > input[name='passwordrepeat']").on("change paste keyup", function(){
		var password = $("#inscription > input[name='password']").val();
		var passwordrepeat = $(this).val();
		if(password != passwordrepeat){
			$("#inscription > label[for='passwordrepeat']").show().text("Les mots de passes sont différents");
			erreurpassre = 1;
		}
		else{
			$("#inscription > label[for='passwordrepeat']").hide();
			erreurpassre = 0;
		}
	});

	$("#inscription").submit(function(){
		if($("#inscription > p > input[type='checkbox']").is(':checked')){
			erreurcheckbox = 0;
			$("#inscription > label[for='bouton']").hide();
		}
		else{
			erreurcheckbox = 1;
		}
		if(erreurpassre == 1 || erreurpass == 1 || erreurpseudo == 1 || erreurmail == 1){
			$("#inscription > label[for='bouton']").show().text("Veuillez corriger les erreurs");
		}
		else if(erreurcheckbox == 1){
			$("#inscription > label[for='bouton']").show().text("Veuillez accepter les CGU");
		}
		else{
			var email = $("#inscription > input[name='email']").val();
			var pseudo = $("#inscription > input[name='pseudo']").val();
			var pass = $("#inscription > input[name='password']").val();
			var passre = $("#inscription > input[name='passwordrepeat']").val();
			var checkbox = $("#inscription > p > input[type='checkbox']").is(':checked');
			$.post("/controllers/inscription.controller.php", 
				{email: email, pseudo: pseudo, password: pass, passwordrepeat: passre, conf: checkbox, action: 3},
				function(data){
					if(data.type == true){
						$("#inscription > label[for='bouton']").addClass("true").show().html(data.message);
					}
					else{
						$("#inscription > label[for='bouton']").show().text(data.message);
					}
				},
				"json"
			);
		}
		return false;
	});
    
    $("#btn-newsletter").click( function () {
		$.post("/controllers/support.controller.php",
			{
				action: 1,
				mail: $("#input-newsletter").val(),
			},
			function (data){
				$("#label-newsletter").css("width", "50%");
				if(data['etat'] == true){
					$("#label-newsletter").addClass("true").show().text(data.message);
				}
				else{
					$("#label-newsletter").show().text(data.message);
				}
			},
			"json"
		);
	});

	$("#form-contact > p > button").click( function () {
		$.post("/controllers/support.controller.php",
			{
				action: 2,
				mail: $("#form-contact input[name='email']").val(),
				nom: $("#form-contact input[name='nom']").val(),
				objet: $("#form-contact input[name='objet']").val(),
				texte: $("#form-contact textarea").val(),
			},
			function (data){
				$("#label-contact").css("width", "70%");
				if(data['etat'] == true){
					$("#label-contact").addClass("true").show().text(data.message);
				}
				else{
					$("#label-contact").show().text(data.message);
				}
			},
			"json"
		);
		return false;
	});

	$("#connect > div:eq(1) > div > div > div:eq(2)").click( function(){
		$("#connect > div:eq(1) > div").addClass("show-connect");
	});

	$("#connect > div:eq(1) > div > div > div:eq(1)").click( function(){
		$("#connect > div:eq(1) > div").addClass("show-ins");
	});

});