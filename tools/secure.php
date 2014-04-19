<?php
/* raccourci le code ,au lieu de mettre htmlentities($valeur,ENT_QUOTES,'UTF-8'); il faudra mettre EncodeText . */
function EncodeString($text){
	return htmlentities($text,ENT_QUOTES,'UTF-8');
}
?>
