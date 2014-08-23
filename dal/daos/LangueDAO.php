<?php

class LangueDAO {
    
    /**
     * Retourne la liste des joueurs du jeu
     * 
     * @return Utilisateur
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
