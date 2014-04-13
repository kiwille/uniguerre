<?php

// === PARAMETRES DE DEVELOPPEMENT
ini_set('display_errors', true);
ini_set('max_execution_time', 15);

// === PARAMETRES DE CHEMINS DU JEU
define("WOOTOOK_DIR_ROOT", __DIR__);
define("WOOTOOK_DIR_INSTALL", WOOTOOK_ROOT . "/install/");
define("WOOTOOK_DIR_ADMIN", WOOTOOK_ROOT . "/admin/");
define("WOOTOOK_DIR_ADMIN", WOOTOOK_ROOT . "/tools/");
define("WOOTOOK_DIR_CONTROLLER", WOOTOOK_ROOT . "/controller/");
define("WOOTOOK_DIR_MODEL", WOOTOOK_ROOT . "/model/");
define("WOOTOOK_DIR_VIEW", WOOTOOK_ROOT . "/view/");

// ==== PARAMETRE DES FICHIERS DE JEU
define("WOOTOOK_FILE_CONFIG", "config.php");
define("WOOTOOK_FILE_CONSTANT", "constant.php");
define("WOOTOOK_FILE_COMMON", "common.php");


?>
