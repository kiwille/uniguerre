<?php

$tabLangue = array();
$ToutesLangues = LangueDAO::selectLangues();
foreach ($ToutesLangues as $langue) {
    $tabLangue[] = $langue['code'];
}

if (isset($_POST["langue"]) && !isset($_SESSION['language']) && in_array($_POST["langue"], $tabLangue)) {
    $_SESSION['language'] = $_POST["langue"];
} elseif (isset($_POST["langue"]) && isset($_SESSION['language']) && in_array($_POST["langue"], $tabLangue)) {
    $_SESSION = array();
    $_SESSION['language'] = $_POST["langue"];
} elseif (!isset($_POST["langue"]) && !isset($_SESSION['language'])) {
    $_SESSION = array();
    $_SESSION['language'] = "FR"; //faire une langue par default
}

$Alltranslation = TranslationDAO::SQLSelectTranslationParCode($_SESSION['language']);
foreach ($Alltranslation as $translation) {
    $lang[$translation['name']] = utf8_encode($translation['value']);
}

$parse = $lang;