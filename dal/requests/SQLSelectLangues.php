<?php

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

    protected function tables() {
        return array(table_languages::NAME_TABLE);
    }
	
    protected function retours(\PDOStatement $req) {
        $row = $req->fetchAll(PDO::FETCH_ASSOC);
        foreach($row as $key => $result)
        {
            if ($row) {
                $c = new Langage(
                    $result[table_languages::idlanguage],
                    $result[table_languages::code],
                    $result[table_languages::name]
                );
                $tab[$key] = $c;
            }
        }
        return $tab;
    }
}