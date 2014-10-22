<?php

class SQLSelectCompterMemeNomUtilisateur extends SqlRead {

    private $identifiant;
    private $email;

    public function __construct($identifiant, $email) {
        $this->identifiant = $identifiant;
        $this->email = $email;
    }

    protected function parametres() {
        $parametres = new Parameters();
        $parametres->add(table_users::username, $this->identifiant);
        $parametres->add(table_users::email, $this->email);

        return $parametres;
    }

    protected function requeteSQL() {
        $requete = " SELECT COUNT(*) AS nbJoueur ";
        $requete .= " FROM {table1} ";
        $requete .= " WHERE ";
        $requete .= table_users::username . " = :" . table_users::username . " OR ";
        $requete .= table_users::email . " = :" . table_users::email . " ";

        return $requete;
    }

    protected function retours(\PDOStatement $req) {
        $nb = null;

        $row = $req->fetch();
        if ($row) {
            $nb = $row["nbJoueur"];
        }

        return $nb;
    }

    protected function tables() {
        return array(table_users::NAME_TABLE);
    }

}

?>
