<?php

/**
 * Description of SqlFramework
 *
 * @author Alves
 */
abstract class SqlBase {
    
    /**
     * @return String Retourne la requete SQL
     */
    abstract protected function requeteSQL();
    
    /**
     * @return array Retourne un tableau de tables, dans l'ordre de requête
     */
    abstract protected function tables();
    
    /**
     * @return Parameters Retourne la liste des paramètres
     */
    abstract protected function parametres();
    
}

?>
