$(document).ready(function() {
		getMsgs();
		// window.setInterval(getMsgs,1000);// actualisation des messages
});

$(document).keyup(function(touche){

    var appui = touche.which || touche.keyCode; // le code est compatible tous navigateurs 

    if(appui == 13){ // si c'est la touche Enter
		var pathname = window.location.pathname; // Returns path only
			getMsgs();
    }
});

function getMsgs() {
	// On lance la requête ajax
	$.getJSON('controller/ajax_game_chat.php', function(data) {
		// Si data['error'] renvoi 0, alors ça veut dire que personne n'est en ligne
		// ce qui n'est pas normal d'ailleurs
		if(data['error'] == '0') {
			alert("ok");
			for (var id in data['list']) {
				
				online+=data["list"][id]["msgs"];		
			}
			$("#msgs").html(online);
		}
	});
}