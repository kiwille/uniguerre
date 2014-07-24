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
if ($infos_complete) {
    $id = UtilisateurDAO::selectVerifierIdentiteConnexion($identifiant, $motDePasse);
    //Si les données sont exactes, on va alors tenté la redirection
    if ($id > 0) {
        $_SESSION["id"] = $id;
        
        require_once 'overview.php';
    } else {
        message($lang['error_write_conn'], $lang['title_conn'], "" . WOOTOOK_WEB_URL . "", MESSAGE_ERROR);
    }
} else {
    message($lang['error_champs_empty'], $lang['title_conn'], "" . WOOTOOK_WEB_URL . "", MESSAGE_WARNING);
}

die();
?>
