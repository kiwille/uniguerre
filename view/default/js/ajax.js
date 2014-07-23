var dir_controller = "controller/";

function ExeRqt(url, querystring, nameid)
{
	var entities = encodeURIComponent(querystring);

	$.ajax({
		url: dir_controller + url + "?" + entities,
		cache: true
	})
	.done(function( html ) {
		$( "#"+nameid+"" ).html( html );
	})
	.fail(function( jqXHR, textStatus) {
		alert("Erreur critique d'exécution ajax: " + textStatus);
	});
}