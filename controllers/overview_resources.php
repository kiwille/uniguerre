<?php

$ressources = RessourceDAO::selectAll();

$ressource="";
foreach ($ressources as $ress) {
    $ressource_lang = TranslationDAO::translate($langage->id_language, $ress->name);
    
    $ressName  = $ressource_lang->name;
    $ressValue = utf8_encode($ressource_lang->value);
    
    $batimentlevel = 2; //TODO
    $prod = array();
    $prod[$ressName] = Formuleressource($ress->coef_prod, $batimentlevel);
    
    $bloc["nameress"] = $ressName;
    $bloc["prodress"] = $prod[$ressName];
    $bloc["textress"] = $ressValue;
     
    $ressource .= Page::construirePagePartielle('part_game_barre_ressources', $bloc);
}

$parse['resources_game'] = $ressource;

?>
