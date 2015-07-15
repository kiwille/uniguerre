<?php

function canSeeMessage($message, $user) {
    return $message->id_sender == '0' ||
        $message->id_sender == $user->id_user ||
        $message->id_recipients == '0' ||
        in_array($user->id_user, explode(",", $message->id_recipients));
}

/**
 * Retourne le nom de l'envoyeur du message de chat
 * 
 * @param string $idSender
 * @return string
 */
function getNameSender($idSender) {
    if ($idSender > 0) {
        $sender = UtilisateurDAO::selectById($idSender);
        return $sender->username;
    }

    return "";
}

/**
 * Retourne les noms des destinataires du message de chat
 * 
 * @param string $idsReceivers
 * @return string
 */
function getNameReceivers($idsReceivers) {
    $strReceivers = "";

    try {
        $receivers = explode(",", $idsReceivers);
        if (count($receivers) == 1 && $receivers[0] == 0) {
            $strReceivers = "TOUS";
        } else {
            foreach ($receivers as $key => $idReceiver) {
                $receiver = UtilisateurDAO::selectById($idReceiver);
                $strReceivers .= $receiver->username;
                $strReceivers .= iif((count($receivers) - 1) != $key, ", ", "");
            }
        }
    } catch (Exception $exc) {
        $strReceivers = "???";
    }

    return $strReceivers;
}

//Faisons nous un petit tableau qui sera transformé en JSON
$tabMessagesChat = array();

//Récupérons nos messages
$messages = ChatDAO::selectAll();

//Traitons les pour avoir ceux qui nous intéresse
foreach ($messages as $key => $message) {
    //Les messages qu'il a envoyé...
    if (canSeeMessage($message, $user)) {
        $nameSender = getNameSender($message->id_sender);
        $nameReceivers = getNameReceivers($message->id_recipients);
        $time = $message->time_msg;
        $mess = $message->msg;
        $is_system = ($nameSender == "");

        $tabMessagesChat[$key] = array(
            "sender" => utf8_encode($nameSender),
            "recipients" => utf8_encode($nameReceivers),
            "time" => date("d/m/Y H:i:s", $time),
            "message" => utf8_encode($mess),
            "is_system" => $is_system
        );
    }
}

//Le tableau est terminé, on encode en JSON.
echo json_encode($tabMessagesChat);
die;
