function getPage(page) {
    $.ajax({
        url: "", cache: true, type: 'POST', data: "page=" + page
    }).done(function (html) {
        $("#page").html(html);
        console.log("Chargement de page " + page + " terminée.");
    }).fail(function (jqXHR, textStatus) {
        console.log("Erreur critique d'exécution ajax: " + textStatus);
    });
}

function submit(page) {
    var data = "page=" + page + "&";
    $("input").each(function (index) { //input
        if ($(this).attr("name"))
            data += $(this).attr("name") + "=" + $(this).val() + "&";
    });

    $("select").each(function (index) { //select
        if ($(this).attr("name"))
            data += $(this).attr("name") + "=" + $(this).val() + "&";
    });

    $.ajax({
        url: "", cache: true, type: "POST", data: data
    }).done(function (html) {
        $("#alert").html(html);
        console.log("Enregistrement des données avec la page " + page + " terminée.");
    }).fail(function (jqXHR, textStatus) {
        console.log("Erreur critique d'exécution ajax: " + textStatus);
    });
}