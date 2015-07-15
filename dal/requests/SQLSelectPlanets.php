<?php

class SQLSelectPlanets extends SqlRead {
    
    protected function parametres() {
        return null;
    }

    protected function requeteSQL() {
        return "SELECT * FROM {table1}";
    }

    protected function retours(\PDOStatement $req) {
        return $req->fetchAll(PDO::FETCH_CLASS, T_Planets::NAME_CLASS);
    }

    protected function tables() {
        return array(T_Planets::NAME_TABLE);
    }

}
