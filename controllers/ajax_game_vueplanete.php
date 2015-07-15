<?php

(defined("EXEC") && (int)$_SESSION["id"] > 0) or die();

$currentPlanet = PlaneteDAO::selectMainPlanet($user);
$parse = array_merge((array)$currentPlanet->getPlanetImage(), $parse);
$parse = array_merge((array)$currentPlanet, $parse);

echo Page::construirePagePartielle('part_game_vueplanete', $parse);
