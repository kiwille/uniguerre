<?php

require_once dirname(__DIR__) . "/tools/includes.php";

$parse = array();
$parse = $lang;
echo Page::construirePagePartielle('part_login_accueil', $parse);
?>
