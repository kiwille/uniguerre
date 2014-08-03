///////////////////////////////////////
/*	GESTION DU SYSTEME DE LANGUAGE   */
///////////////////////////////////////
var lang = ['FR','EN'];
$(".language").each(function(index)
{
	//console.log(index);
	$("#language_"+ String(lang[index]) +"").click(function() {
		// alert(lang[index]);
		// Assign handlers immediately after making the request,
		// and remember the jqxhr object for this request
		$.ajax(
		{					
			type: "POST",
			data: "langue="+lang[index],
			async: false,
			url: dir_controller + "" +$("#ajaxpage").val() +".php",
			success: function(infos)
			{
				$( "#pageLogin" ).html( infos );
			}
		});				
	});
});