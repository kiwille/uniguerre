<?php

require_once dirname(__DIR__) . "/tools/includes.php";
require_once dirname(__DIR__) . "/json/langue.php";
require_once dirname(__DIR__) . "/common.php";

$parse['langimg'] = $langimg;
echo Page::construirePagePartielle('part_login_accueil', $parse);
var_dump($_POST);
?>
