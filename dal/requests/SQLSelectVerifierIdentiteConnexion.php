<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SQLSelectVerifierIdentiteConnexion
 *
 * @author Alves
 */
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
        return "SELECT * FROM {table1} WHERE ". table_users::username ." = :username ";
    }

    protected function retours(\PDOStatement $req) {
        $id = null;
        
        $row = $req->fetch();
        if ($row) { 
            $id = iif(crypt($this->motdepasse, $row["password"]) === $row["password"], $row["id"], -1);
        }
        
        return $id;
    }

    protected function tables() {
        return array(table_users::NAME_TABLE);
    }    
}

?>
