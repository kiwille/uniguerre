<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SqlFramework
 *
 * @author Alves
 */
abstract class SqlBase {
    
    /**
     * @return String Retourne la requete SQL
     */
    protected abstract function requeteSQL();
    
    /**
     * @return array Retourne un tableau de tables, dans l'ordre de requête
     */
    protected abstract function tables();
    
    /**
     * @return array Retourne la liste des paramètres
     */
    protected abstract function parametres();
    
}

?>
