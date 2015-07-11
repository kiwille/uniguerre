<?php

class SQLSelectPlanets extends SqlRead {
    
    protected function parametres() {
        return null;
    }

    protected function requeteSQL() {
        return "SELECT * FROM {table1} t1 INNER JOIN {table2} t2 ON t1.id_planet_image = t2.id_planet_image";
    }

    protected function retours(\PDOStatement $req) {
        return $req->fetchAll(PDO::FETCH_CLASS, T_Planets::NAME_CLASS);
    }

    protected function tables() {
        return array(T_Planets::NAME_TABLE, T_Planets_Images::NAME_TABLE);
    }

}
