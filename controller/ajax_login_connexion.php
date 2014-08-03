<?php

require_once dirname(__DIR__) . "/tools/includes.php";
require_once dirname(__DIR__) . "/json/langue.php";
$parse['langimg'] = $langimg;
echo Page::construirePagePartielle('part_login_connexion', $parse);
?>
