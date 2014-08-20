<?php

if (!access_denied()) {
    $id = intval($_SESSION["id"]);

    $currentPlayer = UtilisateurDAO::selectUtilisateurParId($id);
    //$currentPlanet = PlaneteDAO::selectPlaneteParId(...);
    $parse['player'] = $currentPlayer->getIdentifiant();
    $idLang = $currentPlayer->getId_Langue();
} else {

    Page::includeLang('uniguerre', '.php');

    $langimg = "";
    $AlLanguages = LanguesDAO::selectLangue();
    foreach ($AlLanguages as $value => $UnLanguage) {
        $TabLangue[] = $UnLanguage['code'];
        $idLang[$UnLanguage['code']] = $UnLanguage['id'];
        $langimg .="&nbsp;<img class='language' id='language_" . $UnLanguage['code'] . "' src='" . Page::DIR_THEME . "img/language/" . $UnLanguage['code'] . ".jpg' alt='" . utf8_encode($UnLanguage['name']) . "' title='" . utf8_encode($UnLanguage['name']) . "' />&nbsp;";
        $langimg .="<input type='hidden' id='" . $value . "' value='" . $UnLanguage['code'] . "' />";
    }

    //TODO bon je suis fénéant donc je fais un mini script qui inserer autotmatiquement ....
    $QryInsert = "INSERT INTO `game_translations` (`id`, `id_language`, `name`, `value`) VALUES ";
    foreach ($lang as $key => $result) {
        $QryInsert .= "(NULL, \"2\", \"" . $key . "\", \"" . utf8_decode($result) . "\"),";
    }
    $QryInsert = substr($QryInsert, 0, -1);
    $QryInsert .= ";";

    $_SQL = new _SQL();
    $connect = $_SQL->connexion();
    $requet = $connect->prepare($QryInsert);
// $requet->execute(); # utilisé pour une function 
}

