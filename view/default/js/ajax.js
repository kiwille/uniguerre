function ExeRqt(page)
{
    $.ajax({
        url: "",
        cache: true,
        type: 'POST',
        data: "page=" + page
    })
            .done(function(html) {
        $("#page").html(html);
        console.log("Chargement de page " + page + " terminée.");
    })
            .fail(function(jqXHR, textStatus) {
        console.log("Erreur critique d'exécution ajax: " + textStatus);
    });
}