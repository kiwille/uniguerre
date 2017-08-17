<?php

/**
 * Le fichier includes.php regroupe l'ensemble des classes présentes dans
 * le projet.
 * Pour plus de lisibilité, merci de les classer par ordre alphabétique
 * pour mieux se repérer (pour chacune des catégories).
 * 
 * STRUCTURE DU PROJET :
 * -------------------------------------------------------------------
 * CONTROLLERS < == > SERVICE < == > DAL (dao) < == > DAL (request)
 *             
 * Les outils et classes sont accessibles de n'importe quelle couche.
 * -------------------------------------------------------------------
 */

require_once "constant.php";
require_once dirname(__DIR__) . "/" . UNIGUERRE_FILE_CONFIG;

//////////////////////////////////////////////
// TOOLS
//////////////////////////////////////////////

/**
 * Mini-Framework spécialement réalisé pour ce projet. Ne pas y toucher!
 */
require_once UNIGUERRE_DIR_TOOLS . '/DALFramework/_SQL.php';
require_once UNIGUERRE_DIR_TOOLS . '/DALFramework/Parameters.php';
require_once UNIGUERRE_DIR_TOOLS . '/DALFramework/SqlRead.php';
require_once UNIGUERRE_DIR_TOOLS . '/DALFramework/SqlWrite.php';

/**
 * Les fichiers ci-dessous sont des fonctionnalités pouvant être utilisés 
 * dans d'autres projets car il n'existe pas de référence à ce projet.
 */
require_once UNIGUERRE_DIR_TOOLS . '/getAsUrl.php';
require_once UNIGUERRE_DIR_TOOLS . '/guid.php';
require_once UNIGUERRE_DIR_TOOLS . '/iif.php';
require_once UNIGUERRE_DIR_TOOLS . '/secure.php';
require_once UNIGUERRE_DIR_TOOLS . '/respectsLengthWord.php';
require_once UNIGUERRE_DIR_TOOLS . '/formule.php';
require_once UNIGUERRE_DIR_TOOLS . '/array_sort.php';

//////////////////////////////////////////////
// MODEL
//////////////////////////////////////////////

/**
 * Classes métiers du jeu. Elles suivent généralement la structure de la base
 * de données.
 */
require_once UNIGUERRE_DIR_MODELS . '/Chat.php';
require_once UNIGUERRE_DIR_MODELS . '/Configuration.php';
require_once UNIGUERRE_DIR_MODELS . '/Language.php';
require_once UNIGUERRE_DIR_MODELS . '/Menu.php';
require_once UNIGUERRE_DIR_MODELS . '/Planet.php';
require_once UNIGUERRE_DIR_MODELS . '/PlanetImage.php';
require_once UNIGUERRE_DIR_MODELS . '/User.php';
require_once UNIGUERRE_DIR_MODELS . '/Resource.php';
require_once UNIGUERRE_DIR_MODELS . '/Structure.php';
require_once UNIGUERRE_DIR_MODELS . '/Translation.php';

/**
 * Ci-dessous sont référencés des classes utilitaires concues pour le jeu.
 */
require_once UNIGUERRE_DIR_MODELS . '/core/Page.php';
require_once UNIGUERRE_DIR_MODELS . '/core/Alert.php';
require_once UNIGUERRE_DIR_MODELS . '/core/DatabaseBackup.php';

//////////////////////////////////////////////
// SERVICES
//////////////////////////////////////////////
/**
 * Classes permettant d'effectuer des opérations complexes mais réutilisable
 * sur l'ensemble du jeu, comme par exemple créer des planètes
 */
require_once UNIGUERRE_DIR_SERVICES . '/PlanetService.php';
require_once UNIGUERRE_DIR_SERVICES . '/TranslationService.php';

//////////////////////////////////////////////
// DATA ACCESS LAYER (DAL)
//////////////////////////////////////////////

/**
 * Classe mère de toutes les DAO. Ne pas y toucher!
 */
require_once UNIGUERRE_DIR_DAL . '/daos/DataAccessModel.php';

/**
 * Classes composés de méthode permettant l'interaction avec la base de données 
 */
require_once UNIGUERRE_DIR_DAL . '/daos/ChatDAO.php';
require_once UNIGUERRE_DIR_DAL . '/daos/ConfigurationDAO.php';
require_once UNIGUERRE_DIR_DAL . '/daos/LangueDAO.php';
require_once UNIGUERRE_DIR_DAL . '/daos/MenuDAO.php';
require_once UNIGUERRE_DIR_DAL . '/daos/PlaneteDAO.php';
require_once UNIGUERRE_DIR_DAL . '/daos/PlaneteImageDAO.php';
require_once UNIGUERRE_DIR_DAL . '/daos/UtilisateurDAO.php';
require_once UNIGUERRE_DIR_DAL . '/daos/RessourceDAO.php';
require_once UNIGUERRE_DIR_DAL . '/daos/StructureDAO.php';
require_once UNIGUERRE_DIR_DAL . '/daos/TranslationDAO.php';

/**
 * Classes de requêtage SQL
 */
/* -- INSERT -- */
require_once UNIGUERRE_DIR_DAL . '/requests/sql/insert/SQLInsertChat.php';
/* -- SELECT -- */
require_once UNIGUERRE_DIR_DAL . '/requests/sql/select/SQLSelectChat.php';
require_once UNIGUERRE_DIR_DAL . '/requests/sql/select/SQLSelectConfigurations.php';
require_once UNIGUERRE_DIR_DAL . '/requests/sql/select/SQLSelectLanguages.php';
require_once UNIGUERRE_DIR_DAL . '/requests/sql/select/SQLSelectMenus.php';
require_once UNIGUERRE_DIR_DAL . '/requests/sql/select/SQLSelectPlanets.php';
require_once UNIGUERRE_DIR_DAL . '/requests/sql/select/SQLSelectPlanetsImages.php';
require_once UNIGUERRE_DIR_DAL . '/requests/sql/select/SQLSelectResources.php';
require_once UNIGUERRE_DIR_DAL . '/requests/sql/select/SQLSelectStructures.php';
require_once UNIGUERRE_DIR_DAL . '/requests/sql/select/SQLSelectTranslations.php';
require_once UNIGUERRE_DIR_DAL . '/requests/sql/select/SQLSelectUsers.php';
/** -- UPDATE -- */

/** -- DELETE -- */

/** -- TABLES -- */
require_once UNIGUERRE_DIR_DAL . '/requests/tables/T_Chat.php';
require_once UNIGUERRE_DIR_DAL . '/requests/tables/T_Configurations.php';
require_once UNIGUERRE_DIR_DAL . '/requests/tables/T_Languages.php';
require_once UNIGUERRE_DIR_DAL . '/requests/tables/T_Menus.php';
require_once UNIGUERRE_DIR_DAL . '/requests/tables/T_Planets.php';
require_once UNIGUERRE_DIR_DAL . '/requests/tables/T_Planets_Images.php';
require_once UNIGUERRE_DIR_DAL . '/requests/tables/T_Resources.php';
require_once UNIGUERRE_DIR_DAL . '/requests/tables/T_Structures.php';
require_once UNIGUERRE_DIR_DAL . '/requests/tables/T_Users.php';
require_once UNIGUERRE_DIR_DAL . '/requests/tables/T_Translations.php';

