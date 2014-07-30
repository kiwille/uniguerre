<?php

require_once dirname(__DIR__) . "/tools/includes.php";

 //vérifie l'autoriation d'accès à cette page
if (access_denied()) {
    die("Connectez-vous au jeu pour acc&eacute;der &agrave; cette page");
}else{
    
    $parse = $lang;
	$id = intval($_SESSION["id"]);
    /* parser qui se repete ... en attendant detrouver une page qui se repete dans le game*/
	$player = UtilisateurDAO::selectUtilisateurParId($id);
	$parse['player'] = $player->getIdentifiant();

	$Allressources = RessourceDAO::selectRessources();
	// var_dump($Allressources);
	$ressource = "";
	foreach($Allressources as $thisressource)
	{
		// # voir si on met l'id ou le nom ....
		$rid = $thisressource['rid'];
		$Ressourcename = $thisressource['name'];
		$batimentlevel = 2;
		$prod= array();
		$prod[$Ressourcename] = Formuleressource($thisressource['coef_prod'],$batimentlevel);
		$ressource .= "<td>".$lang[$Ressourcename]." : ".$prod[$Ressourcename]."</td>"; 
	}
	$parse['ressource'] = $ressource;
    $parse['navbar_game'] = Page::construirePagePartielle('part_navbar_game', $parse);
    $parse['clock_game'] = Page::construirePagePartielle('part_clock', $parse);
	$parse['ressource_game'] = Page::construirePagePartielle('part_ressource_game', $parse);
    
    $parse['body_game'] = Page::construirePagePartielle('part_game_overview', $parse);
    
    Page::construirePageFinale('part_body_game', $parse);
    
    echo 'redirection effectuée';
}

?>
