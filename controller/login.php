<?php

require_once dirname(__DIR__) . "/common.php";

$parse['langimg'] = $langimg;
$parse['navbar_login'] = Page::construirePagePartielle('part_navbar_login', $parse);
$parse['clock_login'] = Page::construirePagePartielle('part_clock', $parse);

$parse['body_login'] = Page::construirePagePartielle('part_login_accueil', $parse);

Page::construirePageFinale('part_body_login', $parse, $parse["title_game"]);
?>
