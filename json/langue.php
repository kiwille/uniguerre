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
} else {
    $_SESSION = array();
    $_SESSION['language'] = "FR"; #faire une langue par default
}

$Alltranslation = TranslationDAO::SQLSelectTranslationParCode($_SESSION['language']);
foreach ($Alltranslation as $translation) {
    $lang[$translation['name']] = utf8_encode($translation['value']);
}

$parse = $lang;


    
//Gestion des menus
$menusLogin = MenuDAO::selectMenus(false);
$menusTriesLogin = array_sort($menusLogin, 'order');
$menu = "";
foreach ($menusTriesLogin as $value) {
    if ($_SESSION['language'] == $value['code']) {
        switch ($value['type_url']) {
            case "ajax":
                $bloc["menuName"] = $value['value'];
                $bloc["menuAjax"] = $value['url'];
                $menu .= Page::construirePagePartielle("part_navbar_login_menu_ingame", $bloc);
                break;
            case "ext":
                $bloc["menuName"] = $value['value'];
                $bloc["menuUrl"]  = $value['url'];
                $menu .= Page::construirePagePartielle("part_navbar_login_menu_simpleurl", $bloc);
                break;
            default:
                break;
        }
    }
}

$parse['menuLogin'] = $menu;
//var_dump($menu);
