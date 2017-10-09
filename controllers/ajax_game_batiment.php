<?php

(defined("EXEC") && (int)$_SESSION["id"] > 0) or die();

$structures = StructureDAO::selectAll();

$buildings = array();
$buildingsHtml = "";
foreach ($structures as $key => $structure) {
    if ($structure->structure_type == 1) {
        $building = (array)$structure;
        $buildingsHtml .= Page::construirePagePartielle('part_game_batiments_ligne', $building);
    }
}

$parse['buildings'] = $buildingsHtml;

echo Page::construirePagePartielle('part_game_batiments', $parse);
