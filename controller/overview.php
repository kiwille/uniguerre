<?php

(defined("EXEC") && $_SESSION["id"] > 0) or die(); //Mesure de protection
require_once "navbar_ressources.php";

$parse['navbar'] = Page::construirePagePartielle('part_navbar', $parse);
$parse['clock'] = Page::construirePagePartielle('part_clock', $parse);
$parse['body'] = Page::construirePagePartielle('part_game_vueplanete', $parse);

Page::construirePageFinale('part_body_game', $parse, "Vue générale");
?>
