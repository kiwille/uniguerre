var dir_controller = "controller/";

function ExeRqt(url)
{
	$.ajax({
		url: dir_controller + url,
		cache: true
	})
	.done(function( html ) {
-		$( "#page" ).html( html );
		console.log("Chargement de page " + url + " terminée.");
	})
	.fail(function( jqXHR, textStatus) {
		console.log("Erreur critique d'exécution ajax: " + textStatus);
	});
};