<?php

/**
 * Description of SQLGetUtilisateurs
 *
 * @author Alves
 */
class SQLSelectUtilisateurs extends SqlRead {
    
    protected function parametres() {
        return null;
    }

    protected function requeteSQL() {
        $requete = " SELECT ";
        $requete .= " * ";
        $requete .= " FROM {table1}";
        
        return $requete;
    }

    protected function tables() {
        return array(table_users::NAME_TABLE);
    }

    protected function retours(PDOStatement $req) {
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }


}

?>
