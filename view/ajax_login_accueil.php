<?php

    require_once dirname(__DIR__) . "/tools/includes.php";
    
    $parse = array();
    echo Page::construirePagePartielle('part_login_accueil', $parse);
?>
