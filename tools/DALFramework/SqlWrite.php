<?php

require_once 'SqlBase.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SqlWrite
 *
 * @author Alves
 */
abstract class SqlWrite extends SqlBase {
    
    public function write()
    {
        $requete = $this->requeteSQL();
        $tables = $this->tables();
        
        
        
    }
    
}

?>
