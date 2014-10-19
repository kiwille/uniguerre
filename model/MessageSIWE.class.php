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
         return $levels_message = array( self::MESSAGE_SUCCESS, self::MESSAGE_INFORMATION, self::MESSAGE_WARNING, self::MESSAGE_ERROR);
    }

    /**
     * Affiche le message par niveau d'importance
     * 
     * @param type $message Message à afficher
     * @param type $title Titre du message
     * @param type $url Si le lien de redirection est défini, le bouton retour sera lié à ce lien, sinon rien n'est affiché.
     * @param type $level_message Niveau d'importance du message, par défaut à "Erreur"
     * @throws Exception
     */
    
    static function show($message, $title, $url = null, $level_message = self::MESSAGE_ERROR) {
        global $lang, $langimg;
        
        if (!in_array($level_message, self::getValideLevels()))
                throw new Exception ("Erreur: Type de message non défini.");

        $parse = $lang;
        $parse["langimg"] = $langimg;
        $parse['message'] = $message;
        $parse['titre'] = $title;
        $parse['type_message'] = $level_message;
        $parse['lien'] = iif($url, getUrl($url, $lang['return']), "");

        $parse['navbar_login'] = Page::construirePagePartielle('part_navbar_login', $parse);
        $parse['clock_login'] = Page::construirePagePartielle('part_clock', $parse);
        $parse['body_login'] = Page::construirePagePartielle('part_erreur', $parse);

        Page::construirePageFinale('part_body_login', $parse);
    }

}

?>
