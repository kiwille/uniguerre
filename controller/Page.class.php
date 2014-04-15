<?php

class Page {

    /**
     * Permet la construction partiel d'une page.
     * 
     * @param string $templateName
     * @param array $parse
     * @return string
     */
    static function construirePagePartielle($templateName, $parse) {
        return self::getTemplate($templateName, $parse);
    }

    /**
     * Permet de construire la page finale
     * 
     * @param string $templateName
     * @param array $parse
     * @param string $titre
     */
    static function construirePageFinale($templateName, $parse, $titre = '') {
        //Construction de la page par morceau.
        $parse["titrePage"] = $titre;
        $parse["scriptPage"] = self::construirePagePartielle('script_page', $parse);
        $parse["stylesheetPage"] = self::construirePagePartielle('stylesheet_page', $parse);
        $parse['bodyPage'] = self::construirePagePartielle($templateName, $parse);

        //Construire la page avec les morceaux.
        echo self::getTemplate('html_page', $parse);
        die();
    }

    /**
     * Récupère le template concernée et remplace les occurences par les valeurs 
     * selon les noms des clés du tableau "$parse"
     * 
     * @param string $templateName
     * @param array $parse
     * @return string
     */
    static private function getTemplate($templateName, $parse) {
        //$filename = TEMPLATE_DIR . '/' . TEMPLATE_NAME . "/{$templateName}.html";
        $filename = WOOTOOK_DIR_VIEW . "design\\default\\{$templateName}.html";

        $template = self::ReadFromFile($filename);

        if (strlen(trim($template)) > 0) {
            $page = preg_replace('#\{([a-z0-9\-_]*?)\}#Ssie', '( ( isset($parse[\'\1\']) ) ? $parse[\'\1\'] : \'\' );', $template);
        } else {
            trigger_error("Le template {$templateName} est introuvable", E_USER_ERROR);
            $page = "";
        }

        return $page;
    }

    /**
     * Gestion de la localisation des chaînes pour les langues
     *
     * @param string $filename
     * @param string $extension
     * @return void
     */
    static function includeLang($filename, $extension = '.mo') {
        global $user;

        $pathPattern = ROOT_PATH . "language/%s/{$filename}%s";
        if (isset($user['lang']) && !empty($user['lang'])) {
            if ($fp = @fopen($filename = sprintf($pathPattern, $user['lang'], '.csv'), 'r', true)) {
                fclose($fp);

                require_once $filename;
                return;
            } else if ($fp = @fopen($filename = sprintf($pathPattern, $user['lang'], $extension), 'r', true)) {
                fclose($fp);

                require_once $filename;
                return;
            }
        }

        require_once sprintf($pathPattern, DEFAULT_LANG, '.mo');
        return;
    }

    /**
     * Lecture d'un fichier
     * 
     * @param string $filename
     * @return string
     */
    static private function ReadFromFile($filename) {
        return @file_get_contents($filename);
    }

    /**
     * Ecriture d'un fichier
     * 
     * @param string $filename
     * @param mixed $content
     */
    static private function saveToFile($filename, $content) {
        $content = file_put_contents($filename, $content);
    }

}

?>
