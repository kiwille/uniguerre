<?php

# on demarre la session
session_start();

//Liste des pages autorisées à voir
$autorized = array(
    "index",
    "login",
    "inscription",
    "connexion",
);

$page = (isset($_POST["page"]) && in_array($_POST["page"], $autorized)) ? $_POST["page"] : "index";

require_once "controller/" . $page . ".php";

unset($page);

