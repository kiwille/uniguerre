<?php

(defined("EXEC") && $param_session_id > 0) or die();

$currentPlanet = PlanetService::getMainPlanet($user);
$parse = array_merge((array)$currentPlanet->getPlanetImage(), $parse);
$parse = array_merge((array)$currentPlanet, $parse);

echo Page::construirePagePartielle('part_game_vueplanete', $parse);
