<?php

$parse = array();

if (!access_denied()) {
    /*
     *  PARTIE INGAME 
     */
    
    $id = intval($_SESSION["id"]);

    $currentPlayer = UtilisateurDAO::selectUtilisateurParId($id);
    //$currentPlanet = PlaneteDAO::selectPlaneteParId(...);
    $parse['player'] = $currentPlayer->getIdentifiant();
    $idLang = $currentPlayer->getId_Langue();
} else {
    /*
     * PARTIE LOGIN
     */
    
    Page::includeLang('uniguerre', '.php');
    $tabLangue = array();

    $langimg = "";
    $ToutesLangues = LanguesDAO::selectLangue();
    foreach ($ToutesLangues as $value => $langue) {
        $tabLangue[] = $langue['code'];
        
        $bloc["code"] = $langue['code'];
        $bloc["name"] = utf8_encode($langue['name']);
        $bloc["theme"] = Page::DIR_THEME;
        $bloc["value"] = $value;
        
        $langimg .= Page::construirePagePartielle("part_navbar_login_langue", $bloc);
    }
 
}

