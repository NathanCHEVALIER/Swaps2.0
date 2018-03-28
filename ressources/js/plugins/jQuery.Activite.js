(function($) {

    $.fn.ActiviteHydrator = function(publication){
        this.each(function(){
            
            var $activite = $('<article class="publication type2" id="publication_' + publication['id_activite'] + '">\
            <div>\
                <aside>\
                    <div class="lay-1-2-A" >\
                        <div class="mini-profil" style="background-image: url(\'/publicfiles/' + publication['id_auteur'] + '/profil_'  + publication['profil_auteur'] + '\');">\
                        </div>\
                        <div>\
                            <div>\
                                <span><a href="/membre/' + publication['pseudo_auteur'] + '">' + publication['pseudo_auteur'] + '</a>: ' + publication['titre_activite'] + '</span>\
                            </div>\
                            <div>' + publication['categorie_activite'] + ' - ' + publication['sous_cat_activite'] + '</div>\
                        </div>\
                    </div>\
                    <div>\
                        <div style="background-image: url(\'/ressources/images/blog/act1.jpg\');" ></div>\
                        <div>\
                            <p>' + publication['description_activite'] + '</p>\
                            <div class="geopoint">\
                                <icon size="30l" ic="geopoint-grey"></icon>\
                                ' + publication['lieu_activite'] + '\
                            </div>\
                            <div class="calendar">\
                                <icon size="30l" ic="calendar-grey"></icon>\
                                ' + publication['date_activite'] + '\
                            </div>\
                            <div>\
                                <button>\
                                    <icon size="30l" ic="activite-white"></icon>\
                                    Je participe ( /' + publication['nbparticipants'] + ')\
                                </button>\
                            </div>\
                            <icon size="30br" ic="arrow-grey"></icon>\
                        </div>\
                    </div>\
                </aside>\
                <aside>\
                    <div>\
                        <div>\
                            <div><h4>Conversation</h4></div>\
                            <div><h4>Participants</h4></div>\
                        </div>\
                        <div>\
                            <icon size="30r" ic="cross-grey" />\
                        </div>\
                    </div>\
                </aside>\
            </div>\
        </article>');

        $(this).append($activite);

        $('article#publication_' + publication['id_activite'] + '.type2 icon[ic="arrow-grey"]').click( function(){
            $(this).parents(".publication").addClass("reverse");
        });

        $('article#publication_' + publication['id_activite'] + '.type2 icon[ic="cross-grey"]').click( function(){
            $(this).parents(".publication").removeClass("reverse");
        });

        $('article#publication_' + publication['id_activite'] + '.type2 aside:eq(0) > div:eq(1) > div > div:eq(2) > button').click( function(){
            participate(publication['id_activite']);
        });

        function participate(id) {
            $.post("/controllers/controller.php",
                {
                    action: 220,
                    id: id,
                },
                function (data){
                    if(data['retour'] == true){
                        $("body").AlertNotification("success", "Vous êtes à présent participant de l'activité \"" + publication['titre_activite'] + "\"");
                    }
                    else{
                        $("body").AlertNotification("error", "Une erreur est survenue!");
                    }
                },
                "json"
            );
        }

        participants(publication['id_activite']);

        function participants(id) {
            $.post("/controllers/controller.php",
                {
                    action: 221,
                    id: id,
                },
                function(data, success){
                    for (var i = 0; i < data.length; i++) {
                        $('article#publication_' + publication['id_activite'] + '.type2 aside:eq(1) > div:eq(0) > div:eq(0) > div:eq(1)').MemberCard(data[i], 1);
                    }
                    $('article#publication_' + publication['id_activite'] + '.type2 aside:eq(0) > div:eq(1) > div > div:eq(2) > button').html('<icon size="30l" ic="activite-white"></icon>Je participe (' + data.length + '/' + publication['nbparticipants'] + ')');
                },
                "json"
            );
        }

        });
        return this;
    };

    $.fn.ActiviteEditor = function(){
        this.each(function(){
            var $formulaire = $('\
            <article class="type2">\
                    <aside>\
                        <form id="form_publication" method="post" action="/controllers/controller.php" enctype="multipart/form-data">\
                            <div class="lay-1-2-A" >\
                                <div class="mini-profil" style="background-image: url(\'/publicfiles/' + Session.id + '/profil_' + Session.profil + '\');" ></div>\
                                <div>\
                                    <div>\
                                        <span><a href="/membre/' + Session.pseudo + '">' + Session.pseudo + '</a></span>\
                                        <span>►\
                                            <select name="public" >\
                                                <option value="1" >Public</option>\
                                                <option value="2" >Restreint</option>\
                                                <option value="3" >Privé</option>\
                                            </select>\
                                        </span>\
                                    </div>\
                                </div>\
                            </div>\
                            <div>\
                                <fieldset>\
                                    <input type="text" name="titre" value="" placeholder="Titre" />\
                                </fieldset>\
                                <fieldset>\
                                    <input type="text" name="categorie" value="" placeholder="Catégorie" />\
                                    <input type="text" name="sous_categorie" value="" placeholder="Sous catégorie" />\
                                </fieldset>\
                                <fieldset>\
                                    <input type="text" name="date" value="" placeholder="Date" />\
                                    <input type="text" name="lieu" value="" placeholder="Lieu" />\
                                </fieldset>\
                                <fieldset>\
                                    <input type="number" name="participants" value="" placeholder="Nombre de participants" />\
                                </fieldset>\
                                <textarea class="champ" name="texte" placeholder="Description de l\'activité" rows="15" cols="15"></textarea>\
                                <input type="hidden" name="action" value="200" />\
                                <div>\
                                    <div class="option">\
                                        <input type="hidden" name="option" value="2" />\
                                        <div class="image">\
                                        </div>\
                                    </div>\
                                    <div >\
                                        <div>\
                                            <div>\
                                                <icon ic="img-grey" size="40" />\
                                            </div>\
                                        </div>\
                                        <button type="submit" class="button">Publier</button>\
                                    </div>\
                                </div>\
                            </div>\
                        </form>\
                    </aside>\
                    <div>\
                    </div>\
            </article>');

            $(this).prepend($formulaire);
            $("#form_publication .option").hide();

            $("#form_publication > div:eq(1) > div:eq(0) > div:eq(1) > div > div:eq(0)").click( function(){
                $("#form_publication .option > div").hide();
                $("#form_publication .option").show();
                $("#form_publication .option > .image").show();
                $("#form_publication").parents("article").removeClass();
            });

            function insert_option_img(){
                var $btn_img = $('<input type="file" name="pic[]" accept="image/*" >');
                var $option_img = $('<div class="fileUpload" ><icon size="50" ic="add-grey" /></div>');
                $("#form_publication .option > div.image").append($option_img);
                $option_img.append($btn_img);
                $btn_img.change( function (e) {
                    var files = $(this)[0].files;
                    if (files.length > 0) {
                        var file = files[0];
                        console.log(files[0]);
                        console.log(window.URL.createObjectURL(file));
                        $(this).parents(".fileUpload").css('background-image', 'url("' + window.URL.createObjectURL(file) + '")');
                        if( $(this).parents(".fileUpload").hasClass("added") ){
                        }
                        else{
                            insert_option_img();
                        }
                        $(this).parents(".fileUpload").addClass('added');
                    }
                });
            }

            insert_option_img();

            /** Envoi publication */

            $('#form_publication button[type="submit"]').click( function (e) {
                $("#form_publication").parents(2).addClass("loader");
                e.preventDefault();
                var $form = $("#form_publication");
                var formdata = (window.FormData) ? new FormData($form[0]) : null;
                var data = (formdata !== null) ? formdata : $form.serialize();
                console.log(data);
                $.ajax({
                    url: $form.attr('action'),
                    type: $form.attr('method'),
                    contentType: false, 
                    processData: false, 
                    dataType: 'json', 
                    data: data,
                    success: function (reponse) {
                        if(reponse['retour'] === true){
                            $("body").AlertNotification("success", "Votre activitée a été publiée avec succès!");
                            //$("section article #form_publication").parents("article").publicationHydrator(reponse['infos']['0']);
                        }
                        else{
                            $("body").AlertNotification("error", "Votre activitée a été publiée avec succès!");
                        }
                        $("#form_publication .option > div").hide();
                        $("#form_publication .option").hide();
                        $("#form_publication input[name='option']").val("1");
                        $("#form_publication textarea").val("");
                        $("#form_publication").parents("article").removeClass();
                        $("#form-publication input[type='file']").val("");
                        $("#form-publication input[type='text']").val("");
                        $("#form_publication").parents(2).removeClass("loader");
                    }
                });
                return false;
            });

        });

        return this;

    };

})(jQuery);