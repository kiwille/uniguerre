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
        return array(table_resources::NAME_TABLE);
    }
}

?>
