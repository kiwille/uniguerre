$(document).ready(function() {
    getMsgs();
    // window.setInterval(getMsgs,1000);// actualisation des messages
});

/*$(document).keyup(function(touche) {
    var appui = touche.which || touche.keyCode; // le code est compatible tous navigateurs 

    if (appui === 13) { // si c'est la touche Enter
        var pathname = window.location.pathname; // Returns path only
        getMsgs();
    }
});*/

function getMsgs() {
    // On lance la requête ajax
    $.getJSON($('#dir_controllers').val() + '/json_game_chat.php', function(data) {
        var str = "";
        $.each( data, function( idMess, dataMess ) {
            str += "<div class='well well-sm' style='margin: 0px;'>";
            str += dataMess.time + " > " + dataMess.sender + " à " + dataMess.recipients + ": " + dataMess.message;
            str += "</div>";
        });
        $("#msgs").html(str);
    })
    .fail(function(jqXHR, textStatus) {
        alert("Impossible de récuéperer les données du chat : " + textStatus);
    });
}