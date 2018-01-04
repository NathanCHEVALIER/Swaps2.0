$(function () {

    $("section").html("<article><aside></aside></article>");
    explication1();
    $("section > article > aside > p > button").click( function(){
        formulaire1();
    });

   //Ceci sont les lignes obscurs dans lesquelles tu ne dois jamais aller

    function explication1(){
        $("section > article > aside").html('<h2>Bienvenue sur Swaps</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ut velit quis orci fringilla ultricies vel eu eros. Suspendisse tempor quam quis dolor porttitor euismod. Mauris aliquam, ipsum vel aliquet pharetra, leo nunc pharetra mi, non elementum nunc libero dignissim elit. Etiam accumsan sapien eget magna varius egestas. Nulla facilisi. Sed consequat ultricies risus, a rhoncus urna elementum ac. Duis ornare iaculis quam, vitae placerat metus eleifend in. Sed a auctor nisi. Etiam at nisl varius, suscipit dui a, feugiat diam. Nunc venenatis mi nec massa gravida sodales. Cras euismod interdum mauris non consequat. Fusce nec ipsum suscipit, dignissim mauris sit amet, malesuada ligula. Aliquam gravida ex orci, vitae bibendum est laoreet eget. Morbi nibh lectus, varius a luctus nec, pretium eu metus. <br /><br />Morbi suscipit tincidunt velit, in faucibus nunc. Sed purus metus, volutpat at turpis quis, maximus varius lorem. Morbi volutpat eget felis ut suscipit. Nam ac viverra enim. Morbi ligula mauris, consequat a sodales nec, consequat at neque. Ut lacinia, ex sed aliquet tempus, mi orci faucibus nisi, non laoreet mi libero vitae enim. Integer auctor sodales lorem sit amet condimentum. In eu nisi sapien. Praesent efficitur tristique erat nec dictum. Cras bibendum in nibh porttitor vulputate. Duis viverra neque in quam consequat vestibulum vitae vitae odio.<button class="button" >Suivant</button></p>');
    }

    function formulaire1(){
        var $formulaire = $('\
        <h2>Veuillez renseigner les informations</h2>\
        <form id="formulaire_informations" method="post" action="/controllers/controller.php" enctype="multipart/form-data">\
            <div>\
                <div>\
                    <div>\
                        <input class="champ" type="text" name="prenom" placeholder="Prénom">\
                        <input class="champ" type="text" name="nom" placeholder="Nom">\
                    </div>\
                    <textarea class="champ" name="description" placeholder="Description"> Description </textarea>\
                </div>\
                <div class="fileUpload">\
                    <div></div>\
                    <input class="champ" type="file" name="profil" accept="image/*">\
                </div>\
            </div>\
            <div>\
                <input class="champ" type="hidden" name="action" value="301"/>\
                <input class="champ" type="text" name="adresse" placeholder="Adresse">\
                <div>\
                    <input class="champ" type="text" name="cp" placeholder="Code postal">\
                    <input class="champ" type="text" name="ville" placeholder="Ville">\
                    <input class="champ" type="text" name="pays" placeholder="Pays">\
                </div>\
                <div>\
                    <button type="submit" class="button">Suivant</button>\
                </div>\
            </div>\
        </form>');
        $("section > article > aside").html($formulaire);
        var vignette = $(".mini-profil").attr("style");
        $('#formulaire_informations .fileUpload').find('div').attr("style", vignette);
           
        $('#formulaire_informations button[type="submit"]').click( function (e) {
            e.preventDefault();
            var $form = $("#formulaire_informations");
            var formdata = (window.FormData) ? new FormData($form[0]) : null;
            var data = (formdata !== null) ? formdata : $form.serialize();
    
            $.ajax({
                url: $form.attr('action'),
                type: $form.attr('method'),
                contentType: false, 
                processData: false, 
                dataType: 'json', 
                data: data,
                success: function (response) {
                    if(response.type === true){
                        document.location.href = "/fil-rouge";
                    }
                    else{
                        alert(response.message);
                    }
                }
            });
            return false;
        });
        $('#formulaire_informations .fileUpload input[name="profil"]').change( function (e) {
            var files = $(this)[0].files;
            if (files.length > 0) {
                var file = files[0];
                $('#formulaire_informations .fileUpload').find('div').css('background-image', 'url("' + window.URL.createObjectURL(file) + '")');
            }
        });
    }

});