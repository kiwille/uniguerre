///////////////////////////////////////
/*	GESTION DU SYSTEME DE LANGUAGE   */
///////////////////////////////////////
var lang = ['FR', 'EN'];
$(".language").each(function(index)
{
    $("#language_" + String(lang[index]) + "").click(function() {
        // Assign handlers immediately after making the request,
        // and remember the jqxhr object for this request
        $.ajax({
            type: "POST",
            data: "page=" + $("#ajaxpage").val() + "&langue=" + lang[index],
            async: false,
            url: ""
        })
        .done(function(html) {
            $("#page").html(html);
            console.log("Traduction page en " + lang[index]);
        })
        .fail(function(jqXHR, textStatus) {
            alert("Erreur critique d'exécution ajax: " + textStatus);
        });
        
        $.ajax({
            type: "POST",
            data: "page=ajax_login_menu&langue=" + lang[index],
            async: false,
            url: ""
        })
        .done(function(html) {
            $("#navbarLogin").html(html);
            console.log("Traduction menu en " + lang[index]);
        })
        .fail(function(jqXHR, textStatus) {
            alert("Erreur critique d'exécution ajax: " + textStatus);
        });
    });
});