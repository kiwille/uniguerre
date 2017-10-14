<?php

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "tools/includes.php";

/*echo getNameReceivers("2,3");

function getNameReceivers($idsReceivers) {
    $strReceivers = "";
    
    $receivers = explode(",",$idsReceivers);
    foreach ($receivers as $idReceiver) {
        $receiver = UtilisateurDAO::selectUtilisateurParId($idReceiver);
        $strReceivers .= $receiver->getIdentifiant() . ", ";
    }
    
    return $strReceivers;
}*/
$value1 = "test";
$value2 = "demo";

$hash1 = hashPassword($value1);
var_dump($hash1);
var_dump(verifyPassword($value1, $hash1));

    
$hash2 = hashPassword($value2);
var_dump($hash2);
var_dump(verifyPassword($value2, $hash2));
        
?>
