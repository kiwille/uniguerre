<?php

$Allressources = RessourceDAO::selectRessourcesParLangue($idLang);

$ressource = "";
foreach ($Allressources as $thisressource) {
    $ressName  = $thisressource['name'];
    $ressValue = utf8_encode($thisressource['value']);
    $batimentlevel = 2;
    $prod = array();
    $prod[$ressName] = Formuleressource($thisressource['coef_prod'], $batimentlevel);
    
    $bloc["nameress"] = $ressName;
    $bloc["prodress"] = $prod[$ressName];
    $bloc["textress"] = $ressValue;
     
    $ressource .= Page::construirePagePartielle('part_game_barre_ressources', $bloc);
}

$parse['ressource_game'] = $ressource;

?>
