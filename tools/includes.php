<?php

require_once "constant.php";
require_once dirname(__DIR__) . "/" . UNIGUERRE_FILE_CONFIG;

/** Tools */
/** -- specials tools DALFramework -- */
require_once UNIGUERRE_DIR_TOOLS . '/DALFramework/Parameters.php';
require_once UNIGUERRE_DIR_TOOLS . '/DALFramework/SqlRead.php';
require_once UNIGUERRE_DIR_TOOLS . '/DALFramework/SqlWrite.php';
/** ------------------------ * */
require_once UNIGUERRE_DIR_TOOLS . '/getAsUrl.php';
require_once UNIGUERRE_DIR_TOOLS . '/guid.php';
require_once UNIGUERRE_DIR_TOOLS . '/iif.php';
require_once UNIGUERRE_DIR_TOOLS . '/secure.php';
require_once UNIGUERRE_DIR_TOOLS . '/wordLength.php';
require_once UNIGUERRE_DIR_TOOLS . '/formule.php';
require_once UNIGUERRE_DIR_TOOLS . '/array_sort.php';


/** Model */
/** -- Classe -- */
require_once UNIGUERRE_DIR_MODELS . '/Menu.class.php';
require_once UNIGUERRE_DIR_MODELS . '/MessageSIWE.class.php';
/** ------------ */
require_once UNIGUERRE_DIR_MODELS . '/_SQL.php';
require_once UNIGUERRE_DIR_MODELS . '/BddSave.class.php';
/** ------------ */
require_once UNIGUERRE_DIR_MODELS . '/Langage.class.php';
require_once UNIGUERRE_DIR_MODELS . '/Page.class.php';
require_once UNIGUERRE_DIR_MODELS . '/Utilisateur.class.php';
require_once UNIGUERRE_DIR_MODELS . '/Ressources.class.php';
require_once UNIGUERRE_DIR_MODELS . '/Chat.class.php';

/** DAL (Data Access Layer) > DAO (Data Access Object) */
require_once UNIGUERRE_DIR_DAL . '/daos/UtilisateurDAO.php';
require_once UNIGUERRE_DIR_DAL . '/daos/RessourceDAO.php';
require_once UNIGUERRE_DIR_DAL . '/daos/LangueDAO.php';
require_once UNIGUERRE_DIR_DAL . '/daos/MenuDAO.php';
require_once UNIGUERRE_DIR_DAL . '/daos/TranslationDAO.php';
require_once UNIGUERRE_DIR_DAL . '/daos/ChatDAO.php';

/** DAL (Data Access Layer) > REQUESTS (requêtes SQL) */
require_once UNIGUERRE_DIR_DAL . '/requests/SQLSelectRessources.php';
require_once UNIGUERRE_DIR_DAL . '/requests/SQLSelectRessourcesParIdLangue.php';
require_once UNIGUERRE_DIR_DAL . '/requests/SQLSelectUtilisateurs.php';
require_once UNIGUERRE_DIR_DAL . '/requests/SQLSelectUtilisateurParId.php';
require_once UNIGUERRE_DIR_DAL . '/requests/SQLInsertUtilisateur.php';
require_once UNIGUERRE_DIR_DAL . '/requests/SQLSelectLangues.php';
require_once UNIGUERRE_DIR_DAL . '/requests/SQLSelectVerifierIdentiteConnexion.php';
require_once UNIGUERRE_DIR_DAL . '/requests/SQLSelectCompterMemeNomUtilisateur.php';
require_once UNIGUERRE_DIR_DAL . '/requests/SQLSelectTranslationParCode.php';
require_once UNIGUERRE_DIR_DAL . '/requests/SQLSelectMenus.php';
require_once UNIGUERRE_DIR_DAL . '/requests/SQLSelectChat.php';

/** DAL (Data Access Layer) > REQUESTS (requêtes SQL) > Tables */
require_once UNIGUERRE_DIR_DAL . '/requests/tables/table_planets.php';
require_once UNIGUERRE_DIR_DAL . '/requests/tables/table_resources.php';
require_once UNIGUERRE_DIR_DAL . '/requests/tables/table_users.php';
require_once UNIGUERRE_DIR_DAL . '/requests/tables/table_menus.php';
require_once UNIGUERRE_DIR_DAL . '/requests/tables/table_languages.php';
require_once UNIGUERRE_DIR_DAL . '/requests/tables/table_translations.php';
require_once UNIGUERRE_DIR_DAL . '/requests/tables/table_chat.php';

?>
