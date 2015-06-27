<?php

class SQLSelectUtilisateurParId extends SqlRead {

    private $id;

    public function __construct($id) {
        $this->id = $id;
    }

    protected function parametres() {
        $parametres = new Parameters();
        $parametres->add(table_users::iduser, $this->id);

        return $parametres;
    }

    protected function requeteSQL() {
        $requete = " SELECT ";
        $requete .= " * ";
        $requete .= " FROM {table1} t1 ";
        $requete .= " LEFT JOIN {table2} t2 ON t1." . table_users::id_language . " = t2." . table_languages::idlanguage . " ";
        $requete .= " WHERE ";
        $requete .= table_users::iduser . " = :" . table_users::iduser . " ";

        return $requete;
    }

    protected function tables() {
        return array(table_users::NAME_TABLE, table_languages::NAME_TABLE);
    }

    protected function retours(\PDOStatement $req) {
        $row = $req->fetch();

        if ($row) {
            $l = new Langage(
                $row[table_languages::idlanguage],
                $row[table_languages::code],
                $row[table_languages::name]
            );

            $u = new Utilisateur();
            $u->setId($row[table_users::iduser]);
            $u->setLangage($l);
            $u->setIdentifiant($row[table_users::username]);
            $u->setMotDePasse($row[table_users::password]);
            $u->setEmail($row[table_users::email]);
        }

        return $u;
    }

}