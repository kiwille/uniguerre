<?php

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

$parse['ressource_game'] = Page::construirePagePartielle('part_game_barre_ressources', $parse);

?>
