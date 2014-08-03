<?php

/**
 * Description of UtilisateurDao
 *
 * @author Alves
 */
class LanguesDAO {
    
    /**
     * Retourne la liste des joueurs du jeu
     * 
     * @return Utilisateur
     * @throws Exception
     */
    public static function selectLangue() {
        try {
            $SQLSelectLangues = new SQLSelectLangues();
            return $SQLSelectLangues->read();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}

?>
