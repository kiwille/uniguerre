var dir_controller = "controller/";

function createXHR()
{
    if (window.XMLHttpRequest)
        return new XMLHttpRequest();

    if (window.ActiveXObject) {
        var names = [
            "Msxml2.XMLHTTP.6.0",
            "Msxml2.XMLHTTP.3.0",
            "Msxml2.XMLHTTP",
            "Microsoft.XMLHTTP"
        ];
        for (var i in names) {
            try {
                return new ActiveXObject(names[i]);
            }
            catch (e) {
            }
        }
    }
    window.alert("Votre navigateur ne prend pas en charge l'objet XMLHTTPRequest.");
    return null; // non supporté
}



function ExeRqt(url, querystring, nameid)
{
    var xhr = createXHR();
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4)
        {
            if (xhr.status == 200)
            {
                okFunction(xhr.responseText, nameid);
            }
            else
            {
                errFunction(xhr.status);
            }
        }
    };

	var entities = encodeURIComponent(querystring);
	
    xhr.open("GET", dir_controller + url + "?" + entities, true);
    xhr.send(null);
}

function errFunction(status)
{
    alert("Erreur critique d'exécution ajax:" + status);
}

function okFunction(resultat, nameid)
{
    document.getElementById(nameid).innerHTML = resultat;
}