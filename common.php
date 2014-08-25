<?php

require_once "tools/includes.php";

$result_access = access_denied();

require_once "json/langue.php";

$langimg = "";

if (!$result_access) {
    $id = intval($_SESSION["id"]);

    $currentPlayer = UtilisateurDAO::selectUtilisateurParId($id);
    //$currentPlanet = PlaneteDAO::selectPlaneteParId(...);
    $parse['player'] = $currentPlayer->getIdentifiant();
    $idLang = $currentPlayer->getId_Langue();
} else {
    //Gestion des langues
    $ToutesLangues = LangueDAO::selectLangues();
    foreach ($ToutesLangues as $value => $langue) {
        $bloc["code"] = $langue['code'];
        $bloc["name"] = utf8_encode($langue['name']);
        $bloc["theme"] = Page::DIR_THEME;
        $bloc["value"] = $value;

        $langimg .= Page::construirePagePartielle("part_navbar_login_langue", $bloc);
    }


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
                    $bloc["menuUrl"] = $value['url'];
                    $menu .= Page::construirePagePartielle("part_navbar_login_menu_simpleurl", $bloc);
                    break;
                default:
                    break;
            }
        }
    }

    $parse['menuLogin'] = $menu;
}