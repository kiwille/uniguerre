<?php

class SQLSelectRessourcesParIdLangue extends SqlRead {

    private $id_language;

    public function __construct($id_language) {
        $this->id_language = $id_language;
    }

    protected function parametres() {
        $parametres = new Parameters();
        $parametres->add(table_languages::idlanguage, $this->id_language);

        return $parametres;
    }

    protected function requeteSQL() {
        $requete = " SELECT ";
        $requete .= " * ";
        $requete .= " FROM {table1} t1 ";
        $requete .= " INNER JOIN {table2} t2 ON t1." . table_resources::name . "  = t2." . table_translations::name . " ";
        $requete .= " WHERE ";
        $requete .= table_translations::id_language . " = :" . table_languages::idlanguage . " ";

        return $requete;
    }

    protected function retours(\PDOStatement $req) {
        $row = $req->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    protected function tables() {
        return array(table_resources::NAME_TABLE, table_translations::NAME_TABLE);
    }

}

?>
