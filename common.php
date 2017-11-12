<?php

/**
 * ---------------------------------
 * INITIALISATION
 * ---------------------------------
 * Initialisation de la page
 */
define("EXEC", true);
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . "tools/includes.php";

// Démarrer la session
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

/**
 * ---------------------------------
 * PARAMETRES
 * ---------------------------------
 * Récupérer les valeurs externes lors du chargement de la page
 */
$arguments = array(
    'id'        => VariableRequest::create(
                    Input::INPUT_SESSION, 
                    FilterValidate::FILTER_VALIDATE_INT
                ),
    'page'      => VariableRequest::create(
                    Input::INPUT_POST, 
                    FilterValidate::FILTER_VALIDATE_STRING,
                    FilterSanitize::FILTER_SANITIZE_ENCODED
                ),
    'language'  => VariableRequest::create(
                    Input::INPUT_SESSION, 
                    FilterValidate::FILTER_VALIDATE_STRING,
                    FilterSanitize::FILTER_SANITIZE_STRING
                ),
    'langue'    => VariableRequest::create(
                    Input::INPUT_POST, 
                    FilterValidate::FILTER_VALIDATE_STRING,
                    FilterSanitize::FILTER_SANITIZE_STRING
                ),
);

$parameters = VariableRequest::getParameters($arguments);

$param_session_id = $parameters['id'];
$param_page = $parameters['page'];
$param_session_language = $parameters['language'];
$param_langue = $parameters['langue'];

unset($parameters);

/**
 * ---------------------------------
 * TRAITEMENT DE LA PAGE
 * ---------------------------------
 * $pageDefaut      : Retourne la page par défaut du jeu
 * $pageVisite      : Retourne la page visite
 * $menuVisite      : Retourne le menu visite (selon la page)
 * $tabLangue       : Tableau de langues
 * $user            : Informations du joueur connecté
 * $parse           : contient des mots dans la langue de l'utilisateur
 */
try {
    
    $pathController = NAME_DIRECTORY_CONTROLLERS . DIRECTORY_SEPARATOR;
    $pageDefaut = iif(isset($param_session_id), "overview", "login");
    $pageVisite = isset($param_page) ? $param_page : $pageDefaut;
    
    //Récupération de la langue choisie
    if (!isset($param_session_language)) {
        $param_session_language = UNIGUERRE_LANG;
    } else {
        if (isset($param_langue) && !empty($param_langue)) {
            $param_session_language = $param_langue;
        } else {
            $param_session_language = UNIGUERRE_LANG;
        }
    }

    $tabLangue = array();
    $langues = LanguageDAO::selectAll(); 
    foreach ($langues as $langue) {
        $tabLangue[$langue->code] = $langue->id_language;
    }

    //Traduction
    $lang = array();
    $translations = TranslationService::getTranslationsByLanguage($tabLangue[$param_session_language]);
    foreach ($translations as $translation) {
        $lang[$translation->name] = utf8_encode($translation->value);
    }

    $parse = $lang;

    try {
        if (isset($param_session_id)) {
            $user = UserDAO::selectById($param_session_id);
            //$planet = PlaneteDAO::selectPlaneteParId(...);
            //Language
            $langage = LanguageDAO::selectById($user->id_language);

            //Est dans le jeu (pour le menu)
            $isInGame = true;
        } else {
            //Language
            $langage = LanguageDAO::selectById($tabLangue[$param_session_language]);

            //Est dans le jeu (pour le menu)
            $isInGame = false;
        }
        
        //Récupération de la configuration générale du jeu
        $config = ConfigurationDAO::selectAll();

        //Gestion des menus
        require_once $pathController . 'menu.php';
        $listMenus = MenuDAO::selectAppropriateMenu($isInGame);
        $parse['navbar_menus'] = getMenu($listMenus);
        
        $menuVisite = null;
        foreach($listMenus as $menu) {
            if ($menu->url == $pageVisite) {
                $menuVisite = $menu;
            }
        }
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
} catch (Exception $ex) {
    MessageSIWE::showSimpleMessage($ex->getMessage(), "Erreur");
}

/**
 * ---------------------------------
 * FIN DE LA PAGE
 * ---------------------------------
 * Suppression des variables (sauf session), redirection, etc.
 */
$_SESSION['language'] = $param_session_language;

unset($param_langue);
unset($param_session_language);
unset($param_page);

$urlController = $pathController . $pageVisite . ".php";
if (file_exists($urlController)) {
    require_once $urlController;
} else {
    require_once $pathController . "ajax_erreur.php";
}

die;
