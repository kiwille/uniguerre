<?php

require_once "tools/includes.php";
require_once "json/langue.php";

$langimg = "";

if (!access_denied()) {
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
}