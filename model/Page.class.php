<?php

class Page {

    const NAME_HEADPAGE = "header_page";
    const NAME_FINALPAGE = "final_page";
    const EXT_TEMPLATES = ".html";
    const DEFAULT_LANG = "en";
    const TITLE_PAGE = "Uniguerre";
    const DIR_THEME = "view/default/"; //A remplacer par la valeur utilisateur en BDD

    /**
     * Permet la construction partiel d'une page.
     * 
     * @param string $templateName
     * @param array $parse
     * @return string
     */
    static function construirePagePartielle($templateName, $parse) {
        $parse["path_design"] = self::DIR_THEME;
        
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
        $parse["path_design"] = self::DIR_THEME;

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
        $filename = UNIGUERRE_DIR_ROOT. DIRECTORY_SEPARATOR . self::DIR_THEME . $templateName . self::EXT_TEMPLATES;

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
