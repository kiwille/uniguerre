$(document).ready(function() {
		// actualisation des messages
		window.setInterval(getMsgs,1000);
});

function getMsgs() {
	// On lance la requête ajax
	$.getJSON('controller/ajax_game_chat.php', function(data) {
		// Si data['error'] renvoi 0, alors ça veut dire que personne n'est en ligne
		// ce qui n'est pas normal d'ailleurs
		if(data['error'] == '0') {
			for (var id in data['list']) {
				
				online+=data["list"][id]["msgs"];		
			}
			$("#msgs").html(online);
		}
	});
}