<?php

class SQLSelectMenus extends SqlRead {
    
    protected function parametres() {
        return null;
    }

    protected function requeteSQL() {
        return "SELECT * FROM {table1}";
    }

    protected function retours(\PDOStatement $req) {
        return $req->fetchAll(PDO::FETCH_CLASS, T_Menus::NAME_CLASS);
    }

    protected function tables() {
        return array(T_Menus::NAME_TABLE);
    }

}
