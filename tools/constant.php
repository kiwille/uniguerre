<?php

// === PARAMETRES DE DEVELOPPEMENT
ini_set('display_errors', true);
ini_set('max_execution_time', 15);

// === PARAMETRES DE SERVEUR
ini_set('date.timezone','Europe/Paris');

// === PARAMETRES DE URL
$url = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . "/" . $_SERVER['REQUEST_URI'];
define("UNIGUERRE_WEB_URL", $url);

// === PARAMETRES DE CHEMINS DU JEU
define("UNIGUERRE_DIR_ROOT", dirname(__DIR__));
define("UNIGUERRE_DIR_INSTALL", UNIGUERRE_DIR_ROOT . "/install/");
define("UNIGUERREK_DIR_ADMIN", UNIGUERRE_DIR_ROOT . "/admin/");
define("UNIGUERRE_DIR_TOOLS", UNIGUERRE_DIR_ROOT . "/tools/");
define("UNIGUERRE_DIR_CONTROLLER", UNIGUERRE_DIR_ROOT . "/controller/");
define("UNIGUERRE_DIR_MODEL", UNIGUERRE_DIR_ROOT . "/model/");
define("UNIGUERRE_DIR_VIEW", UNIGUERRE_DIR_ROOT . "/view/");
define("UNIGUERRE_DIR_DAL", UNIGUERRE_DIR_ROOT . "/dal/");

// ==== PARAMETRES DES FICHIERS DE JEU
define("UNIGUERRE_FILE_CONFIG", "config.php");

?>