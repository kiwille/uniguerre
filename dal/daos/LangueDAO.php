<?php

class LangueDAO {
    
    /**
     * Retourne la liste des langues du jeu
     * 
     * @return Langues
     * @throws Exception
     */
    public static function selectLangues() {
        try {
            $SQLSelectLangues = new SQLSelectLangues();
            return $SQLSelectLangues->read();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

?>
