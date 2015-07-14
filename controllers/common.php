<?php

/**
 * ---------------------------------
 * Enumération des variables gloables
 * ---------------------------------
 * $pageDefaut      : Retourne la page par défaut du jeu
 * $pageVisite      : Retourne la page visite
 * $tabLangue       : Tableau de langues
 * $user            : Informations du joueur connecté
 * ...
 */
define("EXEC", true);

//Liste des pages autorisées à voir

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

$pageDefaut = iif(isset($_SESSION['id']), "overview", "login");
$pageVisite = isset($_POST["page"]) ? $_POST["page"] : $pageDefaut;

//Récupération de la langue choisie
if (!isset($_SESSION['language'])) {
    $_SESSION['language'] = (isset($_POST["langue"])) ? $_POST["langue"] : "FR";
}

$tabLangue = array();
$langues = LangueDAO::selectAll();
foreach ($langues as $langue) {
    $tabLangue[$langue->code] = $langue->id_language;
}

//Traduction
$translations = TranslationDAO::selectAll();
foreach ($translations as $translation) {
    if ($translation->id_language == $tabLangue[$_SESSION['language']]) {
        $lang[$translation->name] = utf8_encode($translation->value);
    }
}

$parse = $lang;


try {
    //-------------------------------------------------------------------------------
    if (isset($_SESSION["id"])) {
        $user = UtilisateurDAO::selectById(intval($_SESSION["id"]));
        //$planet = PlaneteDAO::selectPlaneteParId(...);
        
        //Language
        $langage = LangueDAO::selectById($user->id_language);
        
        //Est dans le jeu (pour le menu)
        $isInGame = true;
    } else {
        //Language
        $langage = LangueDAO::selectById($tabLangue[$_SESSION['language']]);
        
        //Est dans le jeu (pour le menu)
        $isInGame = false;
    }
    
    //Gestion des menus
    require_once NAME_DIRECTORY_CONTROLLERS . DIRECTORY_SEPARATOR .'menu.php';
    $listMenus = MenuDAO::selectAppropriateMenu($isInGame);
    $parse['navbar_menus'] = getMenu($listMenus);
//-------------------------------------------------------------------------------
} catch (Exception $ex) {
    echo $ex->getMessage();
}


//Gestion des langues
$langimg = "";
foreach ($langues as $value => $langue) {
    $bloc["code"] = $langue->code;
    $bloc["name"] = utf8_encode($langue->name);
    $bloc["theme"] = Page::getDirectoryTheme();
    $bloc["value"] = $value;

    $langimg .= Page::construirePagePartielle("part_navbar_login_langue", $bloc);
}

$parse['dir_controllers'] = NAME_DIRECTORY_CONTROLLERS;
$parse['stop_exec_js'] = Page::construirePagePartielle("common_stop_exec_js", $parse);

if (file_exists(NAME_DIRECTORY_CONTROLLERS . DIRECTORY_SEPARATOR . $pageVisite . ".php")) {
    require_once NAME_DIRECTORY_CONTROLLERS . DIRECTORY_SEPARATOR . $pageVisite . ".php";
} else {
    require_once NAME_DIRECTORY_CONTROLLERS . DIRECTORY_SEPARATOR . "ajax_erreur.php";
}

unset($pageVisite);
die;
