<?php

require_once dirname(__DIR__) . "/common.php";

$parse['langimg'] = $langimg;
echo Page::construirePagePartielle('part_login_credit', $parse);
?>
