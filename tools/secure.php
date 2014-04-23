<?php

/**
 * Encode une chaine de caractère en UTF-8 grâce à la fonction htmlentities.
 * 
 * @example EncodeString($texte);
 * @param string $text
 * @return type
 */
function EncodeString($texte) {
    return htmlentities($texte, ENT_QUOTES, 'UTF-8');
}


?>
