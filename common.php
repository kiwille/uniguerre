<?php

if (access_denied())
    die("Access denied!");

$currentPlayer = null;
$currentPlanet = null;
$idLang = 0;
$parse = $lang; //TODO a retirer une fois les langues mises en place

$id = intval($_SESSION["id"]);


if ($id > 0) {
    $currentPlayer = UtilisateurDAO::selectUtilisateurParId($id);
    //$currentPlanet = PlaneteDAO::selectPlaneteParId(...);
    $parse['player'] = $currentPlayer->getIdentifiant();
    $idLang = $currentPlayer->getId_Langue();
}

