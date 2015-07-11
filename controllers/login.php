<?php

$parse['langimg'] = $langimg;
$parse['navbar'] = Page::construirePagePartielle('part_navbar', $parse);
$parse['clock'] = Page::construirePagePartielle('part_clock', $parse);
$parse['body'] = Page::construirePagePartielle('part_login_accueil', $parse);

Page::construirePageFinale('part_body_login', $parse, $parse["title_game"]);
?>
