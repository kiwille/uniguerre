<?php

defined("EXEC") or die();

$currentPlanet = PlaneteDAO::selectMainPlanet($user);
$parse = array_merge((array)$currentPlanet[0], $parse);

echo Page::construirePagePartielle('part_game_vueplanete', $parse);

?>
