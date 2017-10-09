<?php

/**
 * Encode une chaine de caractère en UTF-8 grâce à la fonction htmlentities.
 * 
 * @example EncodeString($texte);
 * @param string $texte
 * @return type
 */
function encodeString($texte) {
    return htmlentities($texte, ENT_QUOTES, 'UTF-8');
}

/**
 * Hash un mot de passe
 * 
 * @param type $password
 * @return type
 */
function hashPassword($password) {
    $options = [
        'cost' => 10,
        'salt' => mcrypt_create_iv(22, MCRYPT_DEV_URANDOM),
    ];
    
    return password_hash($password, PASSWORD_BCRYPT, $options);
}

/**
 * Vérifie que le mot de passe passé en paramètre correspond à celle du hash
 * 
 * @param type $password
 * @param type $hash
 * @return boolean
 */
function verifyPassword($password, $hash) {
    if (empty($password)) {
        return false;
    }
    
    return password_verify($password, $hash);
}
