<?php

/**
 * MessageSIWE est une classe qui informe l'utilisateur par niveau d'erreur de message. <br />
 * S = Success / Succès <br />
 * I = Information / Information <br />
 * W = Warning / Attention <br />
 * E = Error / Erreur <br />
 */
class MessageSIWE {

    const MESSAGE_SUCCESS = "panel-success";
    const MESSAGE_INFORMATION = "panel-info";
    const MESSAGE_WARNING = "panel-warning";
    const MESSAGE_ERROR = "panel-danger";

    /**
     * Retourne un tableau des niveaux d'importances valides
     * 
     * @return Array Tableau des niveaux d'importance
     */
    private static function getValideLevels() {
        return $levels_message = array(self::MESSAGE_SUCCESS, self::MESSAGE_INFORMATION, self::MESSAGE_WARNING, self::MESSAGE_ERROR);
    }
    
    /**
     *  Affiche un message. N'est pas compatible avec des erreurs venant de page ajax, voir showAjaxMessage()
     * pour cela.
     * 
     * @global Array $parse Tableau contenant toutes les données permettant la construction d'une page
     * @global Array $langimg Image de langue
     * @param String $message Message de l'erreur
     * @param String $title Titre du message d'erreur
     * @param String $url Si le lien de redirection est défini, le bouton retour sera lié à ce lien, sinon rien n'est affiché.
     * @param MessageSIME $level Niveau d'importance du message, par défaut à "Erreur"
     * @throws Exception
     */
    public static function showSimpleMessage($message, $title, $url = null, $level = self::MESSAGE_ERROR) {
        global $parse, $langimg;
        
        if (!in_array($level, self::getValideLevels()))
            throw new Exception("Erreur: Type de message non défini.");
       
        $parse["langimg"] = $langimg;
        $parse['body'] = self::buildMessage($message, $title, $url, $level);
        $parse['navbar'] = Page::construirePagePartielle('part_navbar', $parse);
        $parse['clock'] = Page::construirePagePartielle('part_clock', $parse);

        if (isset($_SESSION["id"])) {
            Page::construirePageFinale('part_body_game', $parse);
        }else{
            Page::construirePageFinale('part_body_login', $parse);
        }
    }

    /**
     * Affiche le message pour un affichage destiné à une page ajax uniquement
     * 
     * @param String $message Message de l'erreur
     * @param String $title Titre du message d'erreur
     * @param String $url Si le lien de redirection est défini, le bouton retour sera lié à ce lien, sinon rien n'est affiché.
     * @param MessageSIME $level Niveau d'importance du message, par défaut à "Erreur"
     * @throws Exception
     */
    public static function showAjaxMessage($message, $title, $url = null, $level = self::MESSAGE_ERROR) {
        
        if (!in_array($level, self::getValideLevels()))
            throw new Exception("Erreur: Type de message non défini.");
        
        echo self::buildMessage($message, $title, $url, $level);
    }
    
    /**
     * Construit le cadre du message, avec gestion du niveau d'importance
     * 
     * @global Array $lang Tableau d'éléments de traduction du jeu
     * @param String $message Message de l'erreur
     * @param String $title Titre du message
     * @param String $url Si le lien de redirection est défini, le bouton retour sera lié à ce lien, sinon rien n'est affiché.
     * @param String $level_message Niveau d'importance du message, par défaut à "Erreur"
     * @return type
     * @throws Exception
     */
    private static function buildMessage($message, $title, $url = null, $level = self::MESSAGE_ERROR ) {
        global $lang;

        if (!in_array($level, self::getValideLevels()))
            throw new Exception("Erreur: Type de message non défini.");

        $parse = $lang;
        $parse['message'] = $message;
        $parse['titre'] = $title;
        $parse['type_message'] = $level;
        $parse['lien'] = iif($url, getUrl($url, $lang['return']), "");

        return Page::construirePagePartielle('part_erreur', $parse);
    }
    

}

?>
