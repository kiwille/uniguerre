<?php

require_once dirname(__DIR__) . "/tools/includes.php";
require_once dirname(__DIR__) . "/common.php";

// $parse = $lang;
if (isset($_POST["langue"]) && in_array($_POST["langue"], $TabLangue)) {
    $langue = $_POST['langue'];
} else {
    $langue = "FR";
    $parse = $lang;
}

$Alltranslation = TranslationDAO::SQLSelectTranslationParCode($langue);
foreach ($Alltranslation as $translation) {
    $parse[$translation['name']] = utf8_encode($translation['value']);
}
$parse['langimg'] = $langimg;
$parse['navbar_login'] = Page::construirePagePartielle('part_navbar_login', $parse);
$parse['clock_login'] = Page::construirePagePartielle('part_clock', $parse);

$parse['body_login'] = Page::construirePagePartielle('part_login_accueil', $parse);

Page::construirePageFinale('part_body_login', $parse);
?>
