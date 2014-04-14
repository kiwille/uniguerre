<?php

/**
 * Retourne la valeur d'un des 2 valeurs selon l'évaluation d'une expression.
 * 
 * @param bool $expression condition du if()
 * @param mixed $valeurSiTrue valeur de retour si la condition du if() est vrai
 * @param mixed $valeurSiFalse valeur de retour si la condition du if() est faux
 * @return mixed Retourne la valeur de retour en fonction de l'évaluation de l'expression
 */
function iif($expression, $valeurSiTrue, $valeurSiFalse) {        
    return ($expression) ? $valeurSiTrue : $valeurSiFalse;
}

?>
