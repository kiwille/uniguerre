<?php

require_once dirname(__DIR__) . "/tools/includes.php";
require_once dirname(__DIR__) . "/controller/message.php";

$infos_complete = true;

//#### Vérification de la saisie utilisateur
//Validation de l'username
if (isset($_POST["identifiant"]) && wordLength_respected($_POST["identifiant"], SIGNE_SUP_EGAL, 3)) {
    $identifiant = EncodeString($_POST["identifiant"]);
} else {
    $infos_complete = false;
}

//Validation du mot de passe.
if (isset($_POST["motdepasse"]) && wordLength_respected($_POST["motdepasse"], SIGNE_SUP_EGAL, 3)) {
    $motDePasse = EncodeString($_POST["motdepasse"]);
} else {
    $infos_complete = false;
}

//Toutes les informations sont complètes...
if ($infos_complete)
{
    $id = UtilisateurDAO::selectVerifierIdentiteConnexion($identifiant, $motDePasse);
    if ($id > 0) {
		$_SESSION["id"] = $id;
		message(sprintf($lang['welcome'],$identifiant),$lang['title_conn'],null, MESSAGE_SUCCESS);
	} else {
		message($lang['error_write_conn'],$lang['title_conn'],"". WOOTOOK_WEB_URL ."", MESSAGE_ERROR);
	}
} else {
	message($lang['error_champs_empty'],$lang['title_conn'],"". WOOTOOK_WEB_URL ."",MESSAGE_WARNING);
    // var_dump($_POST);
}



# fonctionne
//Sert a rien pour le moment... 
/*$sql = new _SQL();
$requete = $sql->prepare("SELECT * FROM {table1};", array("users"));
$requete->execute();
$test = $requete->fetchAll();

$requete2 = $sql->prepare("SELECT * FROM {table1} WHERE username=:username;", array("users"));
$param = $sql->parametre($requete2, ':username', 'x');
$param->execute();
$test2 = $requete2->fetch();
var_dump($test2);
*/

/* faire :
 * si les donner son bonne alors on rerige avec une session vers la page overview
 * sinon il retourne à la case départ 
 */
die();
?>
