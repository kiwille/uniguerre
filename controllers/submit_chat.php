<?php

/**
 * ---------------------------------
 * PARAMETRES
 * ---------------------------------
 * Récupérer les valeurs externes lors du chargement de la page
 */
$arguments = array(
    'message'       => VariableRequest::create(
                        Input::INPUT_POST, 
                        FilterValidate::FILTER_VALIDATE_STRING,
                        FilterSanitize::FILTER_SANITIZE_STRING
                    ),
    'is_connected'  => VariableRequest::create(
                        Input::INPUT_POST, 
                        FilterValidate::FILTER_VALIDATE_BOOLEAN
                    ),
    'id_recipients' => VariableRequest::create(
                        Input::INPUT_POST, 
                        FilterValidate::FILTER_VALIDATE_STRING,
                        FilterSanitize::FILTER_SANITIZE_STRING
                    ),
    'id'            => VariableRequest::create(
                        Input::INPUT_SESSION,
                        FilterValidate::FILTER_VALIDATE_INT
                    ),
);

$parameters = VariableRequest::getParameters($arguments);

$param_message = $parameters['message'];
$param_is_connected = $parameters['is_connected'];
$param_id_recipients = $parameters['id_recipients'];
$param_session_id = $parameters['id'];

unset($parameters);


/**
 * ---------------------------------
 * TRAITEMENT DE LA PAGE
 * ---------------------------------
 * -
 */
//Formater les destinataires en cas de tentative d'injection
$formatted_recipients = "";
$id_recipients = explode(",", $param_id_recipients);
if (count($id_recipients) > 0) {
    $temp_array = array();
    foreach ($id_recipients as $id_recipient) {
        $id_recipient = (int)$id_recipient;
        if ($id_recipient > 0 && UserDAO::selectById($id_recipient)) {
            $temp_array[] = $id_recipient;
        }
    }
    $formatted_recipients = implode(",", $temp_array);
}else{
    $formatted_recipients = "0";
}

$chat = new Chat();
$chat->time_msg = (new DateTime("now", new DateTimeZone(DATETIME_ZONE)))->getTimestamp();

if (strlen($param_message) > 0) {
    if ($param_is_connected) {
        $chat->id_recipients = $formatted_recipients;
        $chat->id_sender = $param_session_id;
        $chat->msg = $param_message;
    }else{
        $chat->id_recipients = $param_session_id;
        $chat->id_sender = 0;
        $chat->msg = utf8_decode("Vous n'êtes pas connecté au chat.");
    }
}else{
    $chat->id_recipients = $param_session_id;
    $chat->id_sender = 0;
    $chat->msg = utf8_decode("Vous n'avez saisi aucun message.");
}

//send into chat
ChatDAO::add($chat);

/**
 * ---------------------------------
 * FIN DE LA PAGE
 * ---------------------------------
 * Suppression des variables (sauf session), redirection, etc.
 */
unset($param_id_recipients);
unset($param_is_connected);
unset($param_message);
unset($param_session_id);