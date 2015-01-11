<?php

class SQLSelectChat extends SqlRead {
    
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
        return array(table_chat::NAME_TABLE);
    }

    protected function retours(PDOStatement $req) {
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>
