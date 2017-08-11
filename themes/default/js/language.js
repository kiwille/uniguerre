///////////////////////////////////////
/*	GESTION DU SYSTEME DE LANGUAGE   */
///////////////////////////////////////
var lang = ['FR', 'EN'];
$( document ).ready(function() {
	$(".language").each(function(index)
	{
		$("#language_" + String(lang[index]) + "").click(function() {
			
			$.ajax({
				type: "POST",
				data: "page=" + $("#ajaxpage").val() + "&langue=" + lang[index],
				async: false,
				url: "",
				success: function(html, statut) {
					$("#page").html(html);
					console.log("Traduction page en " + lang[index]);
				},
				error: function(resultat, statut, erreur) {
					console.log("Erreur traduction page en " + lang[index]);
				},
				complete: function(resultat, statut) {

				}
			});

			$.ajax({
				type: "POST",
				data: "page=ajax_login_menu&langue=" + lang[index],
				async: false,
				url: "",
				success: function(html, statut) {
					$("#navbarLogin").html(html);
					console.log("Traduction menu en " + lang[index]);
				},
				error: function(resultat, statut, erreur) {
					console.log("Erreur traduction menu en " + lang[index]);
				},
				complete: function(resultat, statut) {

				}
			});

		});
	});
});