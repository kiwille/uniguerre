<?php

class SQLSelectMenus extends SqlRead {

    private $isInGame;

    public function __construct($isInGame) {
        $this->isInGame = $isInGame;
    }

    protected function parametres() {
        $parametres = new Parameters();
        $parametres->add(table_menus::isInGame, $this->isInGame);

        return $parametres;
    }

    protected function requeteSQL() {
        $requete = " SELECT ";
        $requete .= " * ";
        $requete .= " FROM {table1} t1 ";
        $requete .= " INNER JOIN {table2} t2 ON t1." . table_menus::name_menu . "  = t2." . table_translations::name . " ";
        $requete .= " INNER JOIN {table3} t3 ON t2." . table_translations::id_language . "  = t3." . table_languages::idlanguage . " ";
        $requete .= " WHERE ";
        $requete .= table_menus::isInGame . " = :" . table_menus::isInGame . " ";

        return $requete;
    }

    protected function retours(\PDOStatement $req) {
        $row = $req->fetchAll(PDO::FETCH_ASSOC);
        return $row;
    }

    protected function tables() {
        return array(table_menus::NAME_TABLE, table_translations::NAME_TABLE, table_languages::NAME_TABLE);
    }

}