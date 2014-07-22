<?php

require_once dirname(__FILE__) . "/tools/includes.php";
require_once dirname(__FILE__) . "/controller/message.php";

//echo guid();
// message("message", "titre", "http://www.google.fr", MESSAGE_SUCCESS);

/* voir energie appart */
$Allressources = RessourceDAO::selectRessources();
foreach($Allressources as $thisressource)
{
	# voir si on met l'id ou le nom ....
	$rid = $thisressource['rid'];
	$Ressourcename = $thisressource['name'];
	$batimentlevel = 2;
	$prod= array();
	$prod[$Ressourcename] = Formuleressource($thisressource['coef_prod'],$batimentlevel);
	var_dump($prod);
}
?>
