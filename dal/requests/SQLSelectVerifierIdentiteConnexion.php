<?php

class SQLSelectVerifierIdentiteConnexion extends SqlRead {

    private $identifiant;
    private $motdepasse;

    public function __construct($identifiant, $motdepasse) {
        $this->identifiant = $identifiant;
        $this->motdepasse = $motdepasse;
    }

    protected function parametres() {
        $parametres = new Parameters();
        $parametres->add(table_users::username, $this->identifiant);

        return $parametres;
    }

    protected function requeteSQL() {
        $requete = " SELECT * ";
        $requete .= " FROM {table1} ";
        $requete .= " WHERE " . table_users::username . " = :" . table_users::username . " ";

        return $requete;
    }

    protected function retours(\PDOStatement $req) {
        $id = null;

        $row = $req->fetch();
        if ($row) {
            $str_hashing = crypt($this->motdepasse, $row[table_users::password]);
            $id = iif($str_hashing === $row[table_users::password], intval($row[table_users::iduser]), -1);
        }

        return $id;
    }

    protected function tables() {
        return array(table_users::NAME_TABLE);
    }

}

?>
