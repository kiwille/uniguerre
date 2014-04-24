<?php

// === PARAMETRES DE DEVELOPPEMENT
ini_set('display_errors', true);
ini_set('max_execution_time', 15);

// === PARAMETRES DE CHEMINS DU JEU
define("WOOTOOK_DIR_ROOT", dirname(__DIR__));
define("WOOTOOK_DIR_INSTALL", WOOTOOK_DIR_ROOT . "/install/");
define("WOOTOOK_DIR_ADMIN", WOOTOOK_DIR_ROOT . "/admin/");
define("WOOTOOK_DIR_TOOLS", WOOTOOK_DIR_ROOT . "/tools/");
define("WOOTOOK_DIR_CONTROLLER", WOOTOOK_DIR_ROOT . "/controller/");
define("WOOTOOK_DIR_MODEL", WOOTOOK_DIR_ROOT . "/model/");
define("WOOTOOK_DIR_VIEW", WOOTOOK_DIR_ROOT . "/view/");
define("WOOTOOK_DIR_DAL", WOOTOOK_DIR_ROOT . "/dal/");

// ==== PARAMETRES DES FICHIERS DE JEU
define("WOOTOOK_FILE_CONFIG", "config.php");


?>
