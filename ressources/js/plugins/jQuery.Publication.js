(function($) {

    $.fn.publicationHydrator = function(publication){
        this.each(function(){

            var image_publication = "";
            if(publication['image_publication'] != null){
                var images = publication['image_publication'].split(",");
                for(var i = 1; i < images.length; i++){
                    image_publication = image_publication + '<img src="/publicfiles/' + publication['id_auteur'] + '/img_' + images[i] + '" />';
                }
            }

            if(publication['type_publication'] == 3){
                var type_publication = "propose une activité"
            }
            else if(publication['type_publication'] == 2){
                var type_publication = "propose un service";
            }
            else if(publication['type_publication'] == 4){
                var type_publication = "propose un avis"
            }
            else{
                var type_publication = "propose rien"
            }
            
            var $publication = $('<article class="publication type' + publication['type_publication'] + '" id="publication_' + publication['id_publication'] + '" class="type1 ">\
            <div>\
                <aside>\
                    <div class="lay-1-2-A" >\
                        <div class="mini-profil" style="background-image: url(\'/publicfiles/' + publication['id_auteur'] + '/profil_' + publication['profil_auteur'] + '\');">\
                        </div>\
                        <div>\
                            <div>\
                                <span><a href="/membre/' + publication['pseudo_auteur'] + '">' + publication['pseudo_auteur'] + '</a> ' + type_publication + '</span>\
                                <span datetime="' + publication['date_publication'] + '"> - Il y a X jours</span>\
                            </div>\
                            <div>5 pour 1 votes, 1 commentaires, pas de partages</div>\
                        </div>\
                    </div>\
                    <div>\
                        <p>' + publication['texte_publication'] + '</p>\
                        ' + image_publication + '\
                    </div>\
                    <div class="lay-3">\
                        <div>\
                            <div>\
                                <div class="star">\
                                    <div class="star">\
                                        <div class="star">\
                                            <div class="star">\
                                                <div class="star">\
                                                    <div class="starr5"></div>\
                                                </div>\
                                                <div class="starr4"></div>\
                                            </div>\
                                            <div class="starr3"></div>\
                                        </div>\
                                        <div class="starr2"></div>\
                                    </div>\
                                    <div class="starr1"></div>\
                                </div>\
                            </div>\
                        </div>\
                        <div>\
                            <icon size="30" ic="comment" />\
                        </div>\
                        <div>\
                            <icon size="30" ic="share" />\
                        </div>\
                    </div>\
                </aside>\
                <aside>\
                    <div>\
                        <div>\
                            <div>\
                            </div>\
                        </div>\
                        <div>\
                            <icon size="30r" ic="cross-grey" />\
                        </div>\
                        <form method="post" action="">\
                            <div>\
                                <textarea name="commentaire" placeholder="Commentez..."></textarea>\
                                <input value="Send" type="submit">\
                            </div>\
                            <div></div>\
                        </form>\
                    </div>\
                </aside>\
            </div>\
        </article>');

            $(this).append($publication);

            $('#publication_' + publication['id_publication'] + ' > div:eq(0) > aside:eq(0) > div:eq(0) > div:eq(1) > div > span:eq(1)').relativeDate();
            
            function statistiques(id, stats){
                var votes = "Pas de votes";
                var comm = "pas de commentaires";
                var relai = "pas de partages";
                if(stats['nbvotes'] > 0){
                    votes = stats['moyenne'] + " pour " + stats['nbvotes'] + " votes";
                }
                if(stats['nbcomm'] > 0){
                    comm = stats['nbcomm'] + " commentaires";
                }
                if(stats.nbrelai > 0){
                    relai = stats['nbrelai'] + " partages";
                }

                var phrase = votes + ", " + comm + ", " + relai;

                $("#publication_" + id).find("div:eq(0) > aside:eq(0) > div:eq(0) > div:eq(1) > div:eq(1)").html(phrase);
            }

            statistiques(publication['id_publication'], publication['stats_publication']);

            function colorestar(id, datavote){
                $("#publication_" + id + ' .star:lt(5)').removeClass('star_hover');
                $("#publication_" + id + ' .star:lt(4)').removeClass('star_hover');
                $("#publication_" + id + ' .star:lt(3)').removeClass('star_hover');
                $("#publication_" + id + ' .star:lt(2)').removeClass('star_hover');
                $("#publication_" + id + ' .star:lt(1)').removeClass('star_hover');
                if(datavote == 5){
                    $("#publication_" + id + ' .star:lt(5)').addClass('star_hover');
                }
                else if(datavote == 4){
                    $("#publication_" + id + ' .star:lt(4)').addClass('star_hover');
                }
                else if(datavote == 3){
                    $("#publication_" + id + ' .star:lt(3)').addClass('star_hover');
                }
                else if(datavote == 2){
                    $("#publication_" + id + ' .star:lt(2)').addClass('star_hover');
                }
                else if(datavote == 1){
                    $("#publication_" + id + ' .star:lt(1)').addClass('star_hover');
                }
                else{
                }
            }

            colorestar(publication['id_publication'], publication['stats_publication']['vote'])

            function sendvote(id, note) {
                $.post("/controllers/controller.php",
                    {
                        action: 110,
                        note: note,
                        id: id,
                    },
                    function (datavote){
                        if(datavote['retour'] == true){
                            colorestar(datavote['id'], datavote['vote']);
                            statistiques(datavote['id'], datavote['stats']);
                        }
                        else{
                            alert('Une erreur est survenue');
                        }
                    },
                    "json"
                );
            }

            $('#publication_' + publication['id_publication'] + ' .starr1').click( function(){
                sendvote($(this).parents("article").attr('id').substring(12), 1);
            });

            $('#publication_' + publication['id_publication'] + ' .starr2').click( function(){
                sendvote($(this).parents("article").attr('id').substring(12), 2);
            });

            $('#publication_' + publication['id_publication'] + ' .starr3').click( function(){
                sendvote($(this).parents("article").attr('id').substring(12), 3);
            });

            $('#publication_' + publication['id_publication'] + ' .starr4').click( function(){
                sendvote($(this).parents("article").attr('id').substring(12), 4);
            });

            $('#publication_' + publication['id_publication'] + ' .starr5').click( function(){
                sendvote($(this).parents("article").attr('id').substring(12), 5);
            });

            function sendcomment(id, comment) {
                $('#publication_' + publication['id_publication'] + ' form').addClass('loader');
                $('#publication_' + publication['id_publication'] + ' form textarea').val('');
                $.post("/controllers/controller.php",
                    {
                        action: 111,
                        comment: comment,
                        id: id,
                    },
                    function (data){
                        if(data['retour'] == true){
                            statistiques(data['id'], data['stats']);
                            $('#publication_' + publication['id_publication'] + ' form').removeClass('loader');
                            $("body").AlertNotification("success", "Votre commentaire a été publiée avec succès!");
                        }
                        else{
                            $("body").AlertNotification("error", "Une erreur est survenue!");
                        }
                    },
                    "json"
                );
            }

            $('article#publication_' + publication['id_publication'] + ' icon[ic="comment"]').click( function(){
                $(this).parents(".publication").addClass("reverse");
            });

            $('article#publication_' + publication['id_publication'] + ' icon[ic="cross-grey"]').click( function(){
                $(this).parents(".publication").removeClass("reverse");
            });

            $('#publication_' + publication['id_publication'] + ' aside:eq(1) form input[type="submit"]').click( function(){
                sendcomment($(this).parents("article").attr('id').substring(12), $('#publication_' + publication['id_publication'] + ' form textarea').val() );
                return false;
            });

            function loadcomment(id){
                $.post("/controllers/controller.php",
                    {
                        action: 113,
                        id: id,
                    },
                    function (data){
                        if(data.length == 0 ){
                            $('#publication_' + publication['id_publication'] + ' aside:eq(1) > div > div > div:eq(0)').append("Aucun commentaire");
                        }
                        else{
                            for (var i = 0; i < data.length; i++) {
                                $comment = $('\
                                    <div class="lay-1-2-B" >\
                                    <div class="mini-profil" style="background-image: url(\'/publicfiles/' + data[i]['id_auteur'] + '/profil_' + data[i]['profil_auteur'] + '\');">\
                                    </div>\
                                    <div>\
                                        <div>\
                                            <span><a href="/membre/' + data[i]['pseudo_auteur'] + '">' + data[i]['pseudo_auteur'] + '</a></span>\
                                            <span datetime="2017-11-04 18:41:11"> - Il y a 18 jours</span>\
                                        </div>\
                                        <div>' + data[i]['contenu_comm'] + '</div>\
                                    </div>\
                                </div>');
                                $('#publication_' + publication['id_publication'] + ' aside:eq(1) > div > div > div:eq(0)').append($comment);
                            }
                        }
                    },
                    "json"
                );
            }

            loadcomment(publication['id_publication']);

            function sendrelay(idpub, texte) {
                $.post("/controllers/publication.controller.php",
                    {
                        action: 4,
                        relay: texte,
                        id_post: idpub,
                    },
                    function (data){
                        if(data['retour'] == true){
                            $.closeviewer();
                            $("#publication_" + data['id'] + " > div:eq(2) > p").text(data['stat']);
                        }
                        else{
                            alert('Une erreur est survenue');
                        }
                    },
                    "json"
                );
            }

            $('article#publication_' + publication['id_publication'] + ' .partage').click( function(){
                /*var $textarea = $('<textarea id="sharetextarea" spellcheck placeholder="Votre message" ></textarea>');
                var $button = $('<button class="bouton_partage" >Relayer</button>');
                $("#element_viewer").fadeIn(400);
                var id_post = $(this).parents(".publication").attr('id').substring(12);
                /*$.post("/controllers/publication.controller.php",
                    {
                        action: 3,
                        id_post: id_post,
                    },
                    function (data){
                        $("#element_viewer > div:eq(1) > div").html(data).append($textarea).append($button);
                    }
                );
                $button.click(function(){
                    sendrelay(id_post, $textarea.val());
                });	*/
                alert('fct de partage indispo');
            });

            $('article#publication_' + publication['id_publication'] + ' aside:eq(0) > div:eq(0) > div:eq(1) > div > span > a').click( function(){
                $(this).Navigate("membre", publication['pseudo_auteur']);
                return false;
            });

        });
        return this;
    };

    $.fn.publicationEditor = function(){
        this.each(function(){
            var $formulaire = $('\
            <article >\
                    <aside>\
                        <form id="form_publication" method="post" action="/controllers/controller.php" enctype="multipart/form-data">\
                            <div class="lay-1-2-A" >\
                                <div class="mini-profil" style="background-image: url(\'/publicfiles/' + Session.id + '/profil_' + Session.profil + '\');" ></div>\
                                <div>\
                                    <div>\
                                        <span><a href="/membre/' + Session.pseudo + '">' + Session.pseudo + '</a></span>\
                                        <span>►\
                                            <select name="public" >\
                                                <option value="1" >Abonnés</option>\
                                                <option value="2" >Tout le monde</option>\
                                                <option value="3" >Personne</option>\
                                            </select>\
                                        </span>\
                                    </div>\
                                </div>\
                            </div>\
                            <div>\
                                <textarea class="champ" name="texte" placeholder="Quoi de neuf?" rows="15" cols="15"></textarea>\
                                <input type="hidden" name="action" value="101" />\
                                <div>\
                                    <div class="option">\
                                        <input type="hidden" name="option" value="1" />\
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
                $("#form_publication input[name='option']").val("1");
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
            
                $.ajax({
                    url: $form.attr('action'),
                    type: $form.attr('method'),
                    contentType: false, 
                    processData: false, 
                    dataType: 'json', 
                    data: data,
                    success: function (reponse) {
                        if(reponse['retour'] === true){
                            $("body").AlertNotification("success", "Votre pubication a été publiée avec succès!");
                            //$("section article #form_publication").parents("article").publicationHydrator(reponse['infos']['0']);
                        }
                        else{
                            $("body").AlertNotification("error", "Votre pubication a été publiée avec succès!");
                        }
                        $("#form_publication .option > div").hide();
                        $("#form_publication .option").hide();
                        $("#form_publication input[name='option']").val("1");
                        $("#form_publication textarea").val("");
                        $("#form_publication").parents("article").removeClass();
                        $("#form-publication input[type='file']").val("");
                        $("#form_publication").parents(2).removeClass("loader");
                    }
                });
                return false;
            });

        });

        return this;

    };

})(jQuery);
