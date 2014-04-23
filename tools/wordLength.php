<?php

        const SIGNE_INF_STRICT = "<";
        const SIGNE_SUP_STRICT = ">";
        const SIGNE_INF_EGAL = "<=";
        const SIGNE_SUP_EGAL = ">=";
        const SIGNE_EGAL = "=";

/**
 * Détermine si la chaine de caractère respecte la longueur. 
 * Les espaces en début et fin de chaine ne sont pas pris en compte.
 * 
 * @example wordLength_respected("test", SIGNE_EGAL, 0); retournera false 
 * @example wordLength_respected(" test ", SIGNE_EGAL, 4); retournera true
 * @example wordLength_respected("zut", SIGNE_SUP_EGAL, 4); retournera false
 * @param type $string
 * @param type $signe
 * @param type $longueur
 * @return type
 * @throws Exception
 */
function wordLength_respected($string, $signe, $longueur) {
    $tabSigne = array(
        SIGNE_INF_STRICT,
        SIGNE_SUP_STRICT,
        SIGNE_INF_EGAL,
        SIGNE_SUP_EGAL,
        SIGNE_EGAL
    );


    if (!is_string($string)) {
        throw new Exception("Passage de la variable 'string' invalide");
    }
    if (!is_integer($longueur) || $longueur < 0) {
        throw new Exception("Passage de la variable 'longueur' invalide");
    }
    if (!in_array($signe, $tabSigne)) {
        throw new Exception("Passage de la variable 'signe' invalide");
    }

    if ($signe == SIGNE_EGAL) {
        $result = (strlen(trim($string)) == $longueur) ? true : false;
    }
    if ($signe == SIGNE_INF_STRICT) {
        $result = (strlen(trim($string)) < $longueur) ? true : false;
    }
    if ($signe == SIGNE_SUP_STRICT) {
        $result = (strlen(trim($string)) > $longueur) ? true : false;
    }
    if ($signe == SIGNE_INF_EGAL) {
        $result = (strlen(trim($string)) <= $longueur) ? true : false;
    }
    if ($signe == SIGNE_SUP_EGAL) {
        $result = (strlen(trim($string)) >= $longueur) ? true : false;
    }

    return $result;
}

?>
