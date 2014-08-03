<?php

require_once dirname(__DIR__) . "/tools/includes.php";
require_once dirname(__DIR__) . "/common.php";

$Allressources = RessourceDAO::selectRessourcesParLangue($idLang);

$ressource = "";
foreach ($Allressources as $thisressource) {
    $ressName  = $thisressource['name'];
    $ressValue = utf8_encode($thisressource['value']);
    $batimentlevel = 2;
    $prod = array();
    $prod[$ressName] = Formuleressource($thisressource['coef_prod'], $batimentlevel);
    $ressource .= "<td>" . $ressValue . " : " . $prod[$ressName] . "</td>";
}

$parse['ressource'] = $ressource;

$parse['navbar_game'] = Page::construirePagePartielle('part_navbar_game', $parse);
$parse['clock_game'] = Page::construirePagePartielle('part_clock', $parse);
$parse['ressource_game'] = Page::construirePagePartielle('part_game_barre_ressources', $parse);

$parse['body_game'] = Page::construirePagePartielle('part_game_vue_planetaire', $parse);

Page::construirePageFinale('part_body_game', $parse);
?>
