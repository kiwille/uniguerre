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

function EncodePassword($texte) {
	
	// Attention plus ce chiffre est élever, plus le processeur doit travailler pour générer un code. Le code sera bien-sur plus compliquer.
	$cost = 10;
	// Création d'une clé aléatoire
	$salt = strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
	
	// Ajout d'un prefix pour que php arrive a vérifier le code plus tard.
	// "$2a$" veut dire qu'on utilise l'algorithme BlowFish. Suivis par le cost.
	$salt = sprintf("$2a$%02d$", $cost) . $salt;

	// Value:
	// $2a$10$eImiTXuWVxfM37uY4JANjQ==

	// Convertir le mot de passe en hash avec la clé unique.
	$hash = crypt($texte, $salt);
	
	return $hash;
}

?>
