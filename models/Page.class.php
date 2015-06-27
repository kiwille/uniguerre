<?php

class Page {

    const NAME_HEADPAGE = "header_page";
    const NAME_FINALPAGE = "final_page";
    const EXT_TEMPLATES = ".html";
    
    /**
     * Retourne le chemin du thème utilisé dans le jeu
     * @return string
     */
    static function getDirectoryTheme() {
        //TODO A remplacer par la valeur utilisateur en BDD
        $theme_name = UNIGUERRE_THEME;
        //$theme_name = (isset($game_theme)) ? $game_theme : UNIGUERRE_THEME;

        return NAME_DIRECTORY_THEMES . "/" . $theme_name . "/";
    }
    
    /**
     * Permet la construction partiel d'une page.
     * 
     * @param string $templateName
     * @param array $parse
     * @return string
     */
    static function construirePagePartielle($templateName, $parse) {
        $parse["path_design"] = self::getDirectoryTheme();
        
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
        $parse["path_design"] = self::getDirectoryTheme();

        $parse["headPage"] = self::construirePagePartielle(self::NAME_HEADPAGE, $parse);
        $parse["bodyPage"] = self::construirePagePartielle($templateName, $parse);

        //Construire la page avec les morceaux.
        echo self::getTemplate(self::NAME_FINALPAGE, $parse);
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
        $filename = UNIGUERRE_DIR_ROOT . 
                    DIRECTORY_SEPARATOR . 
                    self::getDirectoryTheme() . 
                    DIRECTORY_SEPARATOR . 
                    $templateName . 
                    self::EXT_TEMPLATES;

        $template = self::ReadFromFile($filename);
        
        //var_dump($parse);
        
        if (strlen(trim($template)) > 0) {
            $page = preg_replace_callback(
                    "#\{([a-z0-9\-_]*?)\}#Ssi",
                    function ($m) use ($parse) { return $parse[$m[1]]; } , 
                    $template);
        } else {
            trigger_error("Le template {$templateName} est introuvable sous ce chemin: {$filename}", E_USER_ERROR);
            $page = "";
        }

        return $page;
    }

    /**
     * Lecture d'un fichier.
     * 
     * @param string $filename
     * @return string
     */
    static private function ReadFromFile($filename) {
        return file_get_contents($filename);
    }

    /**
     * Ecriture dans un fichier
     * 
     * @param type $filename
     * @param type $content
     */
    static private function saveToFile($filename, $content) {
        return file_put_contents($filename, $content);
    }

}
