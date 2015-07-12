<?php
/**
 * Détermine si la chaine de caractère respecte la longueur. 
 * Les espaces en début et fin de chaine ne sont pas pris en compte.
 * 
 * @example wordLength_respected("test", "=", 0); retournera false 
 * @example wordLength_respected(" test ", "=", 4); retournera true
 * @example wordLength_respected("riz", ">=", 4); retournera false
 * @param type $string
 * @param type $signe
 * @param type $longueur
 * @return type
 * @throws Exception
 */
function respectsLengthWord($string, $signe, $longueur) {
    $tabSigne = array( "<", ">", "=", "<=", ">=");

    if (!is_string($string)) {
        throw new Exception("Passage de la variable 'string' invalide");
    }
    if (!is_integer($longueur) || $longueur < 0) {
        throw new Exception("Passage de la variable 'longueur' invalide");
    }
    if (!in_array($signe, $tabSigne)) {
        throw new Exception("Passage de la variable 'signe' invalide");
    }

    $lengthStringCleared = strlen(trim($string));
    if ($signe == "=") {
        $result = ($lengthStringCleared == $longueur) ? true : false;
    }
    if ($signe == "<") {
        $result = ($lengthStringCleared < $longueur) ? true : false;
    }
    if ($signe == ">") {
        $result = ($lengthStringCleared > $longueur) ? true : false;
    }
    if ($signe == "<=") {
        $result = ($lengthStringCleared <= $longueur) ? true : false;
    }
    if ($signe == ">=") {
        $result = ($lengthStringCleared >= $longueur) ? true : false;
    }

    return $result;
}

?>
