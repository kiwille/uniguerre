<?php

require_once "constant.php";
require_once dirname(__DIR__) . "/". WOOTOOK_FILE_CONFIG;

/** Tools */
/** -- specials tools DAL -- */
require_once WOOTOOK_DIR_TOOLS . '/DALFramework/Parameters.php';
//require_once WOOTOOK_DIR_TOOLS . '/DALFramework/SqlBase.php';
require_once WOOTOOK_DIR_TOOLS . '/DALFramework/SqlRead.php';
require_once WOOTOOK_DIR_TOOLS . '/DALFramework/SqlWrite.php';
/** ------------------------ **/
require_once WOOTOOK_DIR_TOOLS . '/getAsUrl.php';
require_once WOOTOOK_DIR_TOOLS . '/guid.php';
require_once WOOTOOK_DIR_TOOLS . '/iif.php';
require_once WOOTOOK_DIR_TOOLS . '/secure.php';
require_once WOOTOOK_DIR_TOOLS . '/wordLength.php';
require_once WOOTOOK_DIR_TOOLS . '/formule.php';
require_once WOOTOOK_DIR_TOOLS . '/access_denied.php';


/** Model */
require_once WOOTOOK_DIR_MODEL . '/_SQL.php';
require_once WOOTOOK_DIR_MODEL . '/BddSave.class.php';
require_once WOOTOOK_DIR_MODEL . '/Page.class.php';
require_once WOOTOOK_DIR_MODEL . '/Utilisateur.class.php';
require_once WOOTOOK_DIR_MODEL . '/Ressources.class.php';

/** DAL (Data Access Layer) > DAO (Data Access Object) */
require_once WOOTOOK_DIR_DAL . '/daos/UtilisateurDAO.php';
require_once WOOTOOK_DIR_DAL . '/daos/RessourceDAO.php';
require_once WOOTOOK_DIR_DAL . '/daos/LanguesDAO.php';
require_once WOOTOOK_DIR_DAL . '/daos/TranslationDAO.php';

/** DAL (Data Access Layer) > REQUESTS (requêtes SQL) */
require_once WOOTOOK_DIR_DAL . '/requests/SQLSelectRessources.php';
require_once WOOTOOK_DIR_DAL . '/requests/SQLSelectRessourcesParIdLangue.php';
require_once WOOTOOK_DIR_DAL . '/requests/SQLSelectUtilisateurs.php';
require_once WOOTOOK_DIR_DAL . '/requests/SQLSelectUtilisateurParId.php';
require_once WOOTOOK_DIR_DAL . '/requests/SQLInsertUtilisateur.php';
require_once WOOTOOK_DIR_DAL . '/requests/SQLSelectLangues.php';
require_once WOOTOOK_DIR_DAL . '/requests/SQLSelectVerifierIdentiteConnexion.php';
require_once WOOTOOK_DIR_DAL . '/requests/SQLSelectCompterMemeNomUtilisateur.php';
require_once WOOTOOK_DIR_DAL . '/requests/SQLSelectTranslationParCode.php';

/** DAL (Data Access Layer) > REQUESTS (requêtes SQL) > Tables */
require_once WOOTOOK_DIR_DAL . '/requests/tables/table_planets.php';
require_once WOOTOOK_DIR_DAL . '/requests/tables/table_resources.php';
require_once WOOTOOK_DIR_DAL . '/requests/tables/table_users.php';
require_once WOOTOOK_DIR_DAL . '/requests/tables/table_languages.php';
require_once WOOTOOK_DIR_DAL . '/requests/tables/table_translations.php';

/** Langues **/
# on est obligé de le laisser par default ....
Page::includeLang('uniguerre','.php');

# gestion des langues sur la page login 
# ce n'est pas du tout compliqué ... XD
$langimg = "";
$AlLanguages = LanguesDAO::selectLangue();
foreach($AlLanguages as $value=>$UnLanguage)
{
	$TabLangue[] = $UnLanguage['code'];
	$idLang[$UnLanguage['code']] = $UnLanguage['id'];
	$langimg .="&nbsp;<img class='language' id='language_".$UnLanguage['code']."' src='". Page::DIR_THEME ."img/language/".$UnLanguage['code'].".jpg' alt='".utf8_encode($UnLanguage['name'])."' title='".utf8_encode($UnLanguage['name'])."' />&nbsp;";
	$langimg .="<input type='hidden' id='".$value."' value='".$UnLanguage['code']."' />";
}

# bon je suis fénéant donc je fais un mini script qui inserer autotmatiquement ....
$QryInsert  = "INSERT INTO `game_translations` (`id`, `id_language`, `name`, `value`) VALUES ";
foreach($lang as $key => $result)
{
	$QryInsert  .= "(NULL, \"2\", \"".$key."\", \"".utf8_decode($result)."\"),";
}
$QryInsert = substr($QryInsert,0,-1);
$QryInsert .= ";";

$_SQL = new _SQL();
$connect = $_SQL->connexion();
$requet = $connect->prepare($QryInsert);
// $requet->execute(); # utilisé pour une function 
?>
