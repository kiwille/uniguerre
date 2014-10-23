<?php

ob_start();

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
        $_SESSION = array();
        $_SESSION["id"] = $id;

        header("Location: ". $_SERVER['HTTP_REFERER']); //TODO A voir si cela fonctionne...
        exit;
    } else {        
        MessageSIWE::showSimpleMessage($lang['error_write_conn'], $lang['title_conn'] . $lang['title_game'], WOOTOOK_WEB_URL, MessageSIWE::MESSAGE_ERROR);
    }
} else {
    MessageSIWE::showSimpleMessage($lang['error_champs_empty'], $lang['title_conn'] . $lang['title_game'], WOOTOOK_WEB_URL, MessageSIWE::MESSAGE_WARNING);
}

ob_end_flush();
?>
