<?php

/* ici sera présent toutes les formules */
function Formuleressource($coef,$level)
{
	$calcule = null;
	$calcule = floatval(($coef * $level * pow((1.1), $level)) * (0.1 * (3/2)));
	return $calcule;
}