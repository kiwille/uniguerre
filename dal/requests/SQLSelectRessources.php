<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SQLGetRessources
 *
 * @author Alves
 */
class SQLSelectRessources extends SqlRead{
    
    public function __construct() {
        
    }
    
    protected function parametres() {
        return null;        
    }

    protected function requeteSQL() {
        return "SELECT * FROM {table1}";
    }

    protected function retours(\PDOStatement $req) {
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    protected function tables() {
        return array(table_resources::NAME_TABLE);
    }
}

?>
