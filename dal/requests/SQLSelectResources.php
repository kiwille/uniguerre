<?php

class SQLSelectResources extends SQLRead {
  
    protected function parametres() {
        return null;
    }

    protected function requeteSQL() {
        return "SELECT * FROM {table1}";
    }

    protected function retours(\PDOStatement $req) {
        return $req->fetchAll(PDO::FETCH_CLASS, T_Resources::NAME_CLASS);
    }

    protected function tables() {
        return array(T_Resources::NAME_TABLE);
    }

}
