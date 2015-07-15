var is_connected = true; //Détermine si le joueur est connecté ou non.
var idChat = null; //Mémorisation de l'id de rafraichissement pour le stopper.
var refreshTime = 5; //Rafraichissement toutes les x secondes.

$("#msgs").ready(function () {
    getMsgs();

    $("#refresh-chat").click(function () {
        getMsgs();
    });

    $("#logout-chat").click(function () {
        setStateUserInChat(false);
    });

    $("#login-chat").click(function () {
        setStateUserInChat(true);
        getMsgs();
    });

    $("#message-chat").keyup(function (touche) {
        var appui = touche.which || touche.keyCode;

        if (appui === 13) { //13 = Entrée
            sendMessageChat();
            getMsgs();
        }
    });

    $("#send-chat").click(function () {
        sendMessageChat();
        getMsgs();
    });

    $('#recipients-chat').tokenfield({
        autocomplete: {
            source: $('#recipients-chat').data("source"),
            delay: 100,
            limit: 5,
            minLength: 2
        },
        showAutocompleteOnFocus: true
    });

    setStateUserInChat(is_connected);
});

function setStateUserInChat(is_connected) {
    this.is_connected = is_connected;
    if (is_connected) {
        $("#state-chat").text("Connecté");
        $("#state-chat").css("color", "lime");
        $("#refresh-chat").removeClass('hidden');
        $("#login-chat").addClass('hidden');
        $("#logout-chat").removeClass('hidden');

        idChat = window.setInterval(getMsgs, refreshTime * 1000);// actualisation des messages
    } else {
        $("#state-chat").text("Déconnecté");
        $("#state-chat").css("color", "red");
        $("#refresh-chat").addClass('hidden');
        $("#login-chat").removeClass('hidden');
        $("#logout-chat").addClass('hidden');

        clearInterval(idChat);
    }
}

function getMsgs() {
    $.ajax({
        url: "", cache: true, type: "POST", data: "page=load_messages_chat", async: false, dataType: 'json'
    }).done(function (data) {
        console.log("Messages chargés");
        var str = "";
        $.each(data, function (idMess, dataMess) {
            str += "<div class='well well-sm' style='margin: 0px;'>";
            if (!dataMess.is_system) {
                str += dataMess.time + " > " + dataMess.sender + " à " + dataMess.recipients + ": " + dataMess.message;
            } else {
                str += "<span style='color:red'>" + dataMess.time + " > SYSTEM : " + dataMess.message + "</span>";
            }

            str += "</div>";
        });
        $("#msgs").html(str);
    }).fail(function (jqXHR, textStatus) {
        console.log("Impossible de récupérer les données du chat : " + textStatus + " -- " + jqXHR.responseText);
    });
}

function sendMessageChat() {
    //Récupérer le message
    var message = $("#message-chat").val();
    var id_recipients = new Array();

    $.each($("#recipients-chat").tokenfield('getTokens'), function (key, user) {
        id_recipients.push(user.id);
    });

    var data = "";
    data += "page=submit_chat&";
    data += "is_connected=" + ((is_connected) ? 1 : 0) + "&";
    data += "message=" + encodeURIComponent(message) + "&";
    data += "id_recipients=" + id_recipients.join(",") + "&";

    $.ajax({
        url: "", cache: true, type: "POST", data: data, async: false
    }).fail(function (jqXHR, textStatus) {
        console.log("Impossible d'envoyer un message: " + textStatus);
    });
}