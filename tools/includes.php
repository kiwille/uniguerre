<?php

require_once "constant.php";
require_once dirname(__DIR__) . "/" . UNIGUERRE_FILE_CONFIG;

/** Tools */
/** -- specials tools DALFramework -- */
require_once UNIGUERRE_DIR_TOOLS . '/DALFramework/_SQL.php';
require_once UNIGUERRE_DIR_TOOLS . '/DALFramework/Parameters.php';
require_once UNIGUERRE_DIR_TOOLS . '/DALFramework/SqlRead.php';
require_once UNIGUERRE_DIR_TOOLS . '/DALFramework/SqlWrite.php';
/** ------------------------ * */
require_once UNIGUERRE_DIR_TOOLS . '/getAsUrl.php';
require_once UNIGUERRE_DIR_TOOLS . '/guid.php';
require_once UNIGUERRE_DIR_TOOLS . '/iif.php';
require_once UNIGUERRE_DIR_TOOLS . '/secure.php';
require_once UNIGUERRE_DIR_TOOLS . '/respectsLengthWord.php';
require_once UNIGUERRE_DIR_TOOLS . '/formule.php';
require_once UNIGUERRE_DIR_TOOLS . '/array_sort.php';


/** Model */
/** -- Classe -- */
/** ------------ */
require_once UNIGUERRE_DIR_MODELS . '/Language.php';
require_once UNIGUERRE_DIR_MODELS . '/Planet.php';
require_once UNIGUERRE_DIR_MODELS . '/User.php';
require_once UNIGUERRE_DIR_MODELS . '/Resource.php';
require_once UNIGUERRE_DIR_MODELS . '/Chat.php';
require_once UNIGUERRE_DIR_MODELS . '/Menu.php';
require_once UNIGUERRE_DIR_MODELS . '/Translation.php';
/** ------------ */
require_once UNIGUERRE_DIR_MODELS . '/core/Page.php';
require_once UNIGUERRE_DIR_MODELS . '/core/Alert.php';
require_once UNIGUERRE_DIR_MODELS . '/core/DatabaseBackup.php';
/** ------------ */

/** DAL (Data Access Layer) > DAO (Data Access Object) */
require_once UNIGUERRE_DIR_DAL . '/daos/DataAccessModel.php';
require_once UNIGUERRE_DIR_DAL . '/daos/UtilisateurDAO.php';
require_once UNIGUERRE_DIR_DAL . '/daos/RessourceDAO.php';
require_once UNIGUERRE_DIR_DAL . '/daos/LangueDAO.php';
require_once UNIGUERRE_DIR_DAL . '/daos/MenuDAO.php';
require_once UNIGUERRE_DIR_DAL . '/daos/TranslationDAO.php';
require_once UNIGUERRE_DIR_DAL . '/daos/ChatDAO.php';
require_once UNIGUERRE_DIR_DAL . '/daos/PlaneteDAO.php';

/** DAL (Data Access Layer) > REQUESTS (requêtes SQL) */
require_once UNIGUERRE_DIR_DAL . '/requests/SQLInsertChat.php';
require_once UNIGUERRE_DIR_DAL . '/requests/SQLSelectChat.php';
require_once UNIGUERRE_DIR_DAL . '/requests/SQLSelectLanguages.php';
require_once UNIGUERRE_DIR_DAL . '/requests/SQLSelectMenus.php';
require_once UNIGUERRE_DIR_DAL . '/requests/SQLSelectPlanets.php';
require_once UNIGUERRE_DIR_DAL . '/requests/SQLSelectResources.php';
require_once UNIGUERRE_DIR_DAL . '/requests/SQLSelectTranslations.php';
require_once UNIGUERRE_DIR_DAL . '/requests/SQLSelectUsers.php';

/** DAL (Data Access Layer) > REQUESTS (requêtes SQL) > Tables */
require_once UNIGUERRE_DIR_DAL . '/requests/tables/T_Planets.php';
require_once UNIGUERRE_DIR_DAL . '/requests/tables/T_Planets_Images.php';
require_once UNIGUERRE_DIR_DAL . '/requests/tables/T_Resources.php';
require_once UNIGUERRE_DIR_DAL . '/requests/tables/T_Users.php';
require_once UNIGUERRE_DIR_DAL . '/requests/tables/T_Menus.php';
require_once UNIGUERRE_DIR_DAL . '/requests/tables/T_Languages.php';
require_once UNIGUERRE_DIR_DAL . '/requests/tables/T_Translations.php';
require_once UNIGUERRE_DIR_DAL . '/requests/tables/T_Chat.php';

