<?php

    require_once dirname(__DIR__) . "/tools/includes.php";

    $parse = array();
    $parse['navbar_login'] = Page::construirePagePartielle('navbar_login', $parse);
    //$parse['body_login'] = Page::construirePagePartielle('', $parse);
    
    Page::construirePageFinale('login_body_page', $parse, "Uniguerre");
?>