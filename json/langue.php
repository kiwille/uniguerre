<?php
include_once '../common.php';

if (isset($_POST["langue"]) && !isset($_SESSION['language']) && in_array($_POST["langue"], $TabLangue)) {
    $_SESSION['language'] = $_POST["langue"];
} elseif (isset($_POST["langue"]) && isset($_SESSION['language']) && in_array($_POST["langue"], $TabLangue)) {
    session_destroy();
    $_SESSION['language'] = $_POST["langue"];
} elseif (!isset($_POST["langue"]) && !isset($_SESSION['language'])) {
    session_destroy();
    $_SESSION['language'] = "FR"; #faire une langue par default
}

$Alltranslation = TranslationDAO::SQLSelectTranslationParCode($_SESSION['language']);
foreach ($Alltranslation as $translation) {
    $lang[$translation['name']] = utf8_encode($translation['value']);
}

$parse = $lang;
$parse['title_game'] = WOOTOOK_NAME;