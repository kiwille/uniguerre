<?php

include_once '../tools/includes.php';



/**
 * Retourne le nom de l'envoyeur du message de chat
 * 
 * @param string $idSender
 * @return string
 */
function getNameSender($idSender) {
    $strSender = "";
    
    try {
        $sender = UtilisateurDAO::selectUtilisateurParId($idSender);
        $strSender .= $sender->getIdentifiant();
    } catch (Exception $exc) {
        $strSender = "???";
    }
    
    return $strSender;
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
        $receivers = explode(",",$idsReceivers);
        if (count($receivers) == 1 && $receivers[0] == 0) {
            $strReceivers = "TOUS";
        }else{
            foreach ($receivers as $key => $idReceiver) {
                $receiver = UtilisateurDAO::selectUtilisateurParId($idReceiver);
                $strReceivers .= $receiver->getIdentifiant();
                $strReceivers .= iif( (count($receivers)-1) != $key, ", ", "");
            }  
        }
    } catch (Exception $exc) {
         $strReceivers = "???";
    }
    
    return $strReceivers;
}


//Faisons nous un petit tableau qui sera transformé en JSON
$tabMessagesChat = array();

//id de session
//$id = intval($_SESSION['id']);

//if ($id > 0) {
    //Récupérons nos messages
    $messages = ChatDAO::selectChat();

    //Traitons les pour avoir ceux qui nous intéresse
    foreach ($messages as $key => $message) {
        //Les messages qu'il a envoyé...
        //if ($message->GetIdsender() == $id) {
            $nameSender = getNameSender($message->GetIdsender());
            $nameReceivers = getNameReceivers($message->GetIdrecipients());
            $time = $message->GetTimemsg();
            $mess = $message->GetMsg();

            $tabMessagesChat[$key] = //$message->GetMsgid()
                    array(
                        "sender" => utf8_encode($nameSender), 
                        "recipients" => utf8_encode($nameReceivers),
                        "time" => date("d-m-Y H:i:s",$time),
                        "message" => utf8_encode($mess)
                    );
        //}
    }
//}

//Le tableau est terminé, on encode en JSON.
echo json_encode($tabMessagesChat);
?>
