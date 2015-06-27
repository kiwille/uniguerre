<?php

require_once dirname(__FILE__) . "/tools/includes.php";

echo getNameReceivers("2,3");

function getNameReceivers($idsReceivers) {
    $strReceivers = "";
    
    $receivers = explode(",",$idsReceivers);
    foreach ($receivers as $idReceiver) {
        $receiver = UtilisateurDAO::selectUtilisateurParId($idReceiver);
        $strReceivers .= $receiver->getIdentifiant() . ", ";
    }
    
    return $strReceivers;
}

?>
