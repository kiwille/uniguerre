<?php

(defined("EXEC") && (int)$_SESSION["id"] > 0) or die();

$structures = StructureDAO::selectAll();

$buildings = array();
$buildingsHtml = "";
foreach ($structures as $key => $structure) {
    if ($structure->id_structure_type == 1) {
        $building_label_lang = TranslationService::translate($langage->id_language, $structure->name_label);
        $building_description_lang = TranslationService::translate($langage->id_language, $structure->name_description);
        
        $building = (array)$structure;
        $building["label"] = utf8_encode($building_label_lang->value);
        //$building["description"] = $building_description_lang->value;
        $building["structure_level"] = "NaN";
        $buildingsHtml .= Page::construirePagePartielle('part_game_batimentsligne', $building);
    }
}

$parse['buildings'] = $buildingsHtml;

echo Page::construirePagePartielle('part_game_batiments', $parse);
