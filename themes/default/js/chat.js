var is_connected = true;

$(document).ready(function() {
    getMsgs();
    
    $("#refresh-chat").click(function() {
        getMsgs();
    });
    
    $("#logout-chat").click(function() {
        setStateUserInChat(false);
    });
    
    $("#login-chat").click(function() {
        setStateUserInChat(true);
        getMsgs();
    });
    
    $("#message-chat").keyup(function(touche) {
        var appui = touche.which || touche.keyCode;

        if (appui === 13) { //13 = Entrée
            sendMessageChat();
            getMsgs();
        }
    });
    
    $("#send-chat").click(function() {
        sendMessageChat();
        getMsgs();
    });
    
    setStateUserInChat(is_connected);
    window.setInterval(getMsgs,5000);// actualisation des messages
});

function setStateUserInChat(is_connected) {
    this.is_connected = is_connected;
    if (is_connected) {
        $("#state-chat").text("Connecté");
        $("#state-chat").css("color", "lime");
        $("#refresh-chat").removeClass('hidden');
        $("#login-chat").addClass('hidden');
        $("#logout-chat").removeClass('hidden');
    }else{
        $("#state-chat").text("Déconnecté");
        $("#state-chat").css("color", "red");
        $("#refresh-chat").addClass('hidden');
        $("#login-chat").removeClass('hidden');
        $("#logout-chat").addClass('hidden');
    }
}

function getMsgs() {
    // On lance la requête ajax
    $.getJSON($('#dir_controllers').val() + '/load_messages_chat.php', function(data) {
        console.log("Messages chargés");
        var str = "";
        $.each( data, function( idMess, dataMess ) {
            str += "<div class='well well-sm' style='margin: 0px;'>";
            if (!dataMess.is_system) {
                str += dataMess.time + " > " + dataMess.sender + " à " + dataMess.recipients + ": "+dataMess.message;
            } else {
                str += "<span style='color:red'>"+ dataMess.time + " > SYSTEM : "+ dataMess.message +"</span>";
            }

            str += "</div>";
        });
        $("#msgs").html(str);
    })
    .fail(function(jqXHR, textStatus) {
        alert("Impossible de récuéperer les données du chat : " + textStatus);
    });
}

function sendMessageChat() {
    //Récupérer le message
    var message = $("#message-chat").val();
    
    var data = "";
    data += "page=submit_chat&";
    data += "is_connected="+((is_connected)?1:0)+"&";
    data += "message="+encodeURIComponent(message)+"&";

    $.ajax({
        url: "", cache: true, type: "POST", data: data, async: false
    }).fail(function (jqXHR, textStatus) {
        console.log("Impossible d'envoyer un message: " + textStatus);
    });
}
