<?php

require_once "constant.php";
require_once dirname(__DIR__) . "/". WOOTOOK_FILE_CONFIG;

/** Tools */
require_once WOOTOOK_DIR_TOOLS . '/guid.php';
require_once WOOTOOK_DIR_TOOLS . '/iif.php';
require_once WOOTOOK_DIR_TOOLS . '/secure.php';
require_once WOOTOOK_DIR_TOOLS . '/wordLength.php';

/** Model */
require_once WOOTOOK_DIR_MODEL . '/_SQL.php';
require_once WOOTOOK_DIR_MODEL . '/BddSave.class.php';
require_once WOOTOOK_DIR_MODEL . '/Page.class.php';
require_once WOOTOOK_DIR_MODEL . '/Utilisateur.class.php';

/** DAL (Data Access Layer) */
require_once WOOTOOK_DIR_DAL . '/UtilisateurDAL.class.php';



?>
