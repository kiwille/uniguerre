<?php

/**
 * ---------------------------------
 * INITIALISATION
 * ---------------------------------
 * Initialisation de la page
 */
ob_start();

/**
 * ---------------------------------
 * PARAMETRES
 * ---------------------------------
 * Récupérer les valeurs externes lors du chargement de la page
 */
$arguments = array(
    'identifiant'       => VariableRequest::create(
                            Input::INPUT_POST, 
                            FilterValidate::FILTER_VALIDATE_STRING,
                            FilterSanitize::FILTER_SANITIZE_STRING
                        ),
    'motdepasse'        => VariableRequest::create(
                            Input::INPUT_POST, 
                            FilterValidate::FILTER_VALIDATE_STRING,
                            FilterSanitize::FILTER_SANITIZE_STRING
                        ),
    'HTTP_REFERER'      => VariableRequest::create(
                            Input::INPUT_SERVER, 
                            FilterValidate::FILTER_VALIDATE_STRING,
                            FilterSanitize::FILTER_SANITIZE_STRING
                        ),
);

$parameters = VariableRequest::getParameters($arguments);

$param_identifiant = $parameters['identifiant'];
$param_motdepasse = $parameters['motdepasse'];
$param_HTTP_REFERER = $parameters['HTTP_REFERER'];

unset($parameters);

/**
 * ---------------------------------
 * TRAITEMENT DE LA PAGE
 * ---------------------------------
 * 
 */

$fullData = false;
if (isset($param_identifiant) && respectsLengthWord($param_identifiant, ">=", 3) &&
    isset($param_motdepasse) && respectsLengthWord($param_motdepasse, ">=", 3)) {
        $fullData = true;
}

//Toutes les informations sont complètes...
if ($fullData) {
    $user = UserService::getUserByLogins($param_identifiant, $param_motdepasse);
    
    //Si les données sont exactes, on va alors tenter la redirection
    if (isset($user) && $user->id_user > 0) {
        //TODO à améliorer si possible...
        $_SESSION = array();
        $_SESSION["id"] = $user->id_user;
        
        echo "<script>window.location = '" . $param_HTTP_REFERER . "';</script>";
        exit;
    } else {        
        MessageSIWE::showAjaxMessage($lang['error_write_conn'], $lang['title_conn'] . $lang['title_game'], null, MessageSIWE::MESSAGE_ERROR);
    }
} else {
    MessageSIWE::showAjaxMessage($lang['error_champs_empty'], $lang['title_conn'] . $lang['title_game'], null, MessageSIWE::MESSAGE_ERROR);
}

/**
 * ---------------------------------
 * FIN DE LA PAGE
 * ---------------------------------
 * Suppression des variables (sauf session), redirection, etc.
 */
unset($param_identifiant);
unset($param_motdepasse);
unset($param_HTTP_REFERER);

ob_end_flush();
