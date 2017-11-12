<?php

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
    'email'             => VariableRequest::create(
                            Input::INPUT_POST, 
                            FilterValidate::FILTER_VALIDATE_STRING,
                            FilterSanitize::FILTER_SANITIZE_EMAIL
                        ),
    'PM'                => VariableRequest::create(
                            Input::INPUT_POST, 
                            FilterValidate::FILTER_VALIDATE_STRING,
                            FilterSanitize::FILTER_SANITIZE_STRING
                        ),
    'Lang'              => VariableRequest::create(
                            Input::INPUT_POST, 
                            FilterValidate::FILTER_VALIDATE_INT
                        ),
);

$parameters = VariableRequest::getParameters($arguments);

$param_identifiant = $parameters['identifiant'];
$param_motdepasse = $parameters['motdepasse'];
$param_email = $parameters['email'];
$param_PM = $parameters['PM'];
$param_lang = $parameters['Lang'];

unset($parameters);

/**
 * ---------------------------------
 * TRAITEMENT DE LA PAGE
 * ---------------------------------
 * 
 */
$fullData       = false;
if (isset($param_identifiant) && respectsLengthWord($param_identifiant, ">=", 3) &&
    isset($param_motdepasse) && respectsLengthWord($param_motdepasse, ">=", 3) && 
    isset($param_email) && respectsLengthWord($param_email, ">=", 3) && 
    isset($param_PM) && respectsLengthWord($param_PM, ">=", 3) && 
    isset($param_lang)
   ) {
        $fullData = true;
}

//Toutes les informations sont complètes...
if ($fullData) {
    if (!UserService::userExistByUsernameAndEmail($param_identifiant, $param_motdepasse)) {
        //Création planète
        $p = new Planet();
        $p->assignValueDefault();
        //Création utilisateur
        $u = new User();
        $u->id_language = $param_lang;
        $u->username = $param_identifiant;
        $u->hash_password = hashPassword($param_motdepasse);
        $u->email = $param_email;
        UserDAO::add($u);

        $message = $lang['sign_finish'] . "" . $param_identifiant . "" . $lang['return_mail'];
        MessageSIWE::showAjaxMessage($message, $lang['title_sign'] . $lang['title_game'], null, MessageSIWE::MESSAGE_SUCCESS);
    } else {
        MessageSIWE::showAjaxMessage($lang['error_isset_user'], $lang['title_sign'], null, MessageSIWE::MESSAGE_ERROR);
    }
} else {
    MessageSIWE::showAjaxMessage($lang['error_champs_empty'], $lang['title_sign'] . $lang['title_game'], null, MessageSIWE::MESSAGE_ERROR);
}
?>
