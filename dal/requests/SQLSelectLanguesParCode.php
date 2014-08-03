<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SQLSelectLangues
 *
 * @author Alves
 */
class SQLSelectLangues extends SqlRead {
    
    protected function parametres() {
        return null;
    }

    protected function requeteSQL() {
        $requete = " SELECT ";
        $requete .= " * ";
        $requete .= " FROM {table1}";
        
        return $requete;
    }

    protected function retours(\PDOStatement $req) {
        $row = $req->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    protected function tables() {
        return array(table_languages::NAME_TABLE);
    }
}

?>
