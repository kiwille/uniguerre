<?php

define("EXEC", true);
require_once "tools/includes.php";

//Liste des pages autorisées à voir

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

$pageDefaut = iif(isset($_SESSION['id']), "overview", "login");
$pageVisite = isset($_POST["page"]) ? $_POST["page"] : $pageDefaut;

//Récupération de la langue choisie
$tabLangue = array();
$ToutesLangues = LangueDAO::selectLangues();
foreach ($ToutesLangues as $langue) {
    $tabLangue[] = $langue->getCode();
	$veriflangueinscription[$langue->getCode()] = intval($langue->getId());
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
        $langage = $currentPlayer->getLangage();
        $idLang = $langage->getId();
        
        //Gestion des menus
        $menu = new Menu();
        $menu->setTemplateAjax("part_navbar_menu_ingame");
        $menu->setTemplateSimpleUrl("part_navbar_menu_simpleurl");
        $menu->setTemplateParentMenu("part_navbar_menu_parentmenu");
        $menu->setSortColumnName(table_menus::numberSort);
        $menu->setLangage($langage->getCode());
        
        $parse['navbar_menus'] = $menu->getMenu(MenuDAO::selectMenus(true));
    } else {
        //Gestion des menus
        $menu = new Menu();
        $menu->setTemplateAjax("part_navbar_menu_ingame");
        $menu->setTemplateSimpleUrl("part_navbar_menu_simpleurl");
        $menu->setTemplateParentMenu("part_navbar_menu_parentmenu");
        $menu->setSortColumnName(table_menus::numberSort);
        $menu->setLangage($_SESSION["language"]);

        $parse['navbar_menus'] = $menu->getMenu(MenuDAO::selectMenus(false));
    }
    //-------------------------------------------------------------------------------
}catch(Exception $ex) {
    echo $ex->getMessage();
}


//Gestion des langues
$langimg = "";
foreach ($ToutesLangues as $value => $langue) {
    $bloc["code"] = $langue->getCode();
    $bloc["name"] = utf8_encode($langue->getName());
    $bloc["theme"] = Page::DIR_THEME;
    $bloc["value"] = $value;

    $langimg .= Page::construirePagePartielle("part_navbar_login_langue", $bloc);
}

if (file_exists("controller/" . $pageVisite . ".php")) {
    require_once "controller/" . $pageVisite . ".php";
}else{
    require_once "controller/ajax_erreur.php";
}

unset($pageVisite);







