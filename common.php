<?php

define("EXEC", true);
require_once "tools/includes.php";

//Liste des pages autorisées à voir

if (session_status() != PHP_SESSION_ACTIVE)
    session_start();

$pageDefaut = iif(isset($_SESSION['id']), "overview", "login");
$pageVisite = isset($_POST["page"]) ? $_POST["page"] : $pageDefaut;

//Récupération de la langue choisie
$tabLangue = array();
$ToutesLangues = LangueDAO::selectLangues();
foreach ($ToutesLangues as $langue) {
    $tabLangue[] = $langue['code'];
}

if (isset($_POST["langue"]) && !isset($_SESSION['language']) && in_array($_POST["langue"], $tabLangue)) {
    $_SESSION['language'] = $_POST["langue"];
} elseif (isset($_POST["langue"]) && isset($_SESSION['language']) && in_array($_POST["langue"], $tabLangue)) {
    $_SESSION['language'] = $_POST["langue"];
} elseif (!isset($_SESSION['language'])) {
    $_SESSION['language'] = "FR"; //faire une langue par default
}

$Alltranslation = TranslationDAO::SQLSelectTranslationParCode($_SESSION['language']);
foreach ($Alltranslation as $translation) {
    $lang[$translation['name']] = utf8_encode($translation['value']);
}

$parse = $lang;


try {
    //-------------------------------------------------------------------------------
    if (isset($_SESSION["id"])) {
        $id = intval($_SESSION["id"]);

        $currentPlayer = UtilisateurDAO::selectUtilisateurParId($id);
        //$currentPlanet = PlaneteDAO::selectPlaneteParId(...);
        $parse['player'] = $currentPlayer->getIdentifiant();
        $idLang = $currentPlayer->getId_Langue();

        $parse["board"] = 'Forum'; //temporaire
    } else {
        //Gestion des menus
        $menu = new Menu();
        $menu->setTemplateAjax("part_navbar_login_menu_ingame");
        $menu->setTemplateSimpleUrl("part_navbar_login_menu_simpleurl");
        $menu->setTemplateParentMenu("");
        $menu->setSortColumnName("order");
        $menu->setLangage($_SESSION["language"]);

        $parse['menuLogin'] = $menu->getMenu(MenuDAO::selectMenus(false));
    }
    //-------------------------------------------------------------------------------
}catch(Exception $ex) {
    echo $ex->getMessage();
}


//Gestion des langues
$langimg = "";
foreach ($ToutesLangues as $value => $langue) {
    $bloc["code"] = $langue['code'];
    $bloc["name"] = utf8_encode($langue['name']);
    $bloc["theme"] = Page::DIR_THEME;
    $bloc["value"] = $value;

    $langimg .= Page::construirePagePartielle("part_navbar_login_langue", $bloc);
}

require_once "controller/" . $pageVisite . ".php";

unset($pageVisite);







