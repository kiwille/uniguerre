///////////////////////////////////////
/*	GESTION DU SYSTEME DE LANGUAGE   */
///////////////////////////////////////
var lang = ['FR', 'EN'];
$(".language").each(function(index)
{
    $("#language_" + String(lang[index]) + "").click(function() {
        // Assign handlers immediately after making the request,
        // and remember the jqxhr object for this request
        $.ajax(
                {
                    type: "POST",
                    data: "langue=" + lang[index],
                    async: false,
                    url: dir_controller + "" + $("#ajaxpage").val() + ".php",
                    success: function(infos)
                    {
                        $("#pageLogin").html(infos);
                    }
                })    
                .done(function() {
                        console.log("Traduction page en " + lang[index] );
                })
                .fail(function( jqXHR, textStatus) {
                        alert("Erreur critique d'exécution ajax: " + textStatus);
                });
    });
});