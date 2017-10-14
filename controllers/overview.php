<?php

(defined("EXEC") && (int)$_SESSION["id"] > 0) or die();

require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "overview_resources.php";
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "overview_planets.php";

$currentPlanet = PlanetService::getMainPlanet($user);
$parse = array_merge((array)$currentPlanet->getPlanetImage(), $parse);
$parse = array_merge((array)$currentPlanet, $parse);

$parse['navbar'] = Page::construirePagePartielle('part_navbar', $parse);
$parse['clock'] = Page::construirePagePartielle('part_clock', $parse);
$parse['body'] = Page::construirePagePartielle('part_game_vueplanete', $parse);

Page::construirePageFinale('part_body_game', $parse, "Vue générale");
