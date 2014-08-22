<?php

require dirname(__DIR__) . "/common.php";

require_once "navbar_ressources.php";

$parse['navbar_game'] = Page::construirePagePartielle('part_navbar_game', $parse);
$parse['clock_game'] = Page::construirePagePartielle('part_clock', $parse);

$parse['body_game'] = Page::construirePagePartielle('part_game_vue_planetaire', $parse);

Page::construirePageFinale('part_body_game', $parse);
?>
