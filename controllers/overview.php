<?php

(defined("EXEC") && (int)$_SESSION["id"] > 0) or die();

require_once "overview_resources.php";
require_once "overview_planets.php";

$currentPlanet = PlaneteDAO::selectMainPlanet($user);
$parse = array_merge((array)$currentPlanet->getPlanetImage(), $parse);
$parse = array_merge((array)$currentPlanet, $parse);

$parse['navbar'] = Page::construirePagePartielle('part_navbar', $parse);
$parse['clock'] = Page::construirePagePartielle('part_clock', $parse);
$parse['body'] = Page::construirePagePartielle('part_game_vueplanete', $parse);

Page::construirePageFinale('part_body_game', $parse, "Vue générale");
