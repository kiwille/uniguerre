<?php

    require_once dirname(__DIR__) . "/tools/includes.php";
    
    $parse = array();
    $parse['navbar_login'] = Page::construirePagePartielle('part_navbar_login', $parse);
    $parse['clock_login'] = Page::construirePagePartielle('part_clock', $parse);
    
    Page::construirePageFinale('part_body_login', $parse, "Uniguerre");
?>