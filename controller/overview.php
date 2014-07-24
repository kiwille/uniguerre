<?php

require_once dirname(__DIR__) . "/tools/includes.php";

 //vérifie l'autoriation d'accès à cette page
if (access_denied()) {
    die("Connectez-vous au jeu pour acc&eacute;der &agrave; cette page");
}else{
    
    $parse = $lang;
    
    $parse['navbar_game'] = Page::construirePagePartielle('part_navbar_game', $parse);
    $parse['clock_game'] = Page::construirePagePartielle('part_clock', $parse);
    
    $parse['body_game'] = Page::construirePagePartielle('part_game_overview', $parse);
    
    Page::construirePageFinale('part_body_game', $parse);
    
    echo 'redirection effectuée';
}

?>
