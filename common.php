<?php

if (access_denied())
    die("Access denied!");

$currentPlayer = null;
$currentPlanet = null;
$idLang = 0;
$parse = array();

$id = intval($_SESSION["id"]);


if ($id > 0) {
    $currentPlayer = UtilisateurDAO::selectUtilisateurParId($id);
    //$currentPlanet = 
    $parse['player'] = $currentPlayer->getIdentifiant();
    $idLang = $currentPlayer->getId_Langue();
}

