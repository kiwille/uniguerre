<?php

class MenuDAO {
    
    /**
     * Récupère les menus. Le paramètre passé détermine si les menus sont celle
     * de la page d'accueil de jeu ou celle du jeu en lui-même
     * 
     * @param type $isInGame indique si le menu est celle d'accueil ou celle 
     * dans le jeu
     * @return type
     * @throws Exception
     */
    public static function selectMenus($isInGame) {
        try {
            $SQLSelectMenus = new SQLSelectMenus($isInGame);
            return $SQLSelectMenus->read();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}