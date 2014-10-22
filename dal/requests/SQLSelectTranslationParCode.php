<?php

class SQLSelectTranslationParCode extends SqlRead {

    private $code;

    public function __construct($code) {
        $this->code = $code;
    }

    protected function parametres() {
        $parametres = new Parameters();
        $parametres->add(table_languages::code, $this->code);

        return $parametres;
    }

    protected function requeteSQL() {
        $requete = " SELECT ";
        $requete .= " * ";
        $requete .= " FROM {table1} t1 ";
        $requete .= " INNER JOIN {table2} t2 ON t1." . table_languages::idlanguage . "  = t2." . table_translations::id_language . " ";
        $requete .= " WHERE ";
        $requete .= table_languages::code . " = :" . table_languages::code . " ";

        return $requete;
    }

    protected function retours(\PDOStatement $req) {
        $row = $req->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    protected function tables() {
        return array(table_languages::NAME_TABLE, table_translations::NAME_TABLE);
    }

}

?>
