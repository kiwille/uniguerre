<?php

defined("EXEC") or die();

$option = "";
foreach ($langues as $l) {
    $option .="<option value='" . $l->code . "'>" . utf8_encode($l->name) . "</option>";
}

$parse['option_langage'] = $option;
$parse['langimg'] = $langimg;

echo Page::construirePagePartielle('part_login_inscription', $parse);

?>
