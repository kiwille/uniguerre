<?php

/**
 * ---------------------------------
 * Enumération des variables globales
 * ---------------------------------
 * $pageDefaut      : Retourne la page par défaut du jeu
 * $pageVisite      : Retourne la page visite
 * $menuVisite      : Retourne le menu visite (selon la page)
 * $tabLangue       : Tableau de langues
 * $user            : Informations du joueur connecté
 * $parse           : contient des mots dans la langue de l'utilisateur
 */
try {

    define("EXEC", true);
    require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "tools/includes.php";

    if (session_status() != PHP_SESSION_ACTIVE) {
        session_start();
    }

    $pageDefaut = iif(isset($_SESSION['id']), "overview", "login");
    $pageVisite = isset($_POST["page"]) ? $_POST["page"] : $pageDefaut;

    //Récupération de la langue choisie
    if (!isset($_SESSION['language'])) {
        $_SESSION['language'] = UNIGUERRE_LANG;
    } else {
        if (isset($_POST['langue']) && !empty($_POST["langue"])) {
            $_SESSION['language'] = $_POST["langue"];
        } else {
            $_SESSION['language'] = UNIGUERRE_LANG;
        }
    }

    $tabLangue = array();
    $langues = LanguageDAO::selectAll(); 
    foreach ($langues as $langue) {
        $tabLangue[$langue->code] = $langue->id_language;
    }

    //Traduction
    $lang = array();
    $translations = TranslationService::getTranslationsByLanguage($tabLangue[$_SESSION['language']]);
    foreach ($translations as $translation) {
        $lang[$translation->name] = utf8_encode($translation->value);
    }

    $parse = $lang;

    try {
        //-------------------------------------------------------------------------------
        if (isset($_SESSION["id"])) {
            $user = UserDAO::selectById(intval($_SESSION["id"]));
            //$planet = PlaneteDAO::selectPlaneteParId(...);
            //Language
            $langage = LanguageDAO::selectById($user->id_language);

            //Est dans le jeu (pour le menu)
            $isInGame = true;
        } else {
            //Language
            $langage = LanguageDAO::selectById($tabLangue[$_SESSION['language']]);

            //Est dans le jeu (pour le menu)
            $isInGame = false;
        }
        
        //Récupération de la configuration générale du jeu
        $config = ConfigurationDAO::selectAll();

        //Gestion des menus
        require_once NAME_DIRECTORY_CONTROLLERS . DIRECTORY_SEPARATOR . 'menu.php';
        $listMenus = MenuDAO::selectAppropriateMenu($isInGame);
        $parse['navbar_menus'] = getMenu($listMenus);
        
        $menuVisite = null;
        foreach($listMenus as $menu) {
            if ($menu->url == $pageVisite) {
                $menuVisite = $menu;
            }
        }
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
} catch (Exception $ex) {
    MessageSIWE::showSimpleMessage($ex->getMessage(), "Erreur");
}

unset($pageVisite);
die;
