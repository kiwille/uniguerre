<?php

/**
 * Description of SQLGetUtilisateurParId
 *
 * @author Alves
 */
class SQLSelectUtilisateurParId extends SqlRead {
    
    private $id;
    
    public function __construct($id) {
        $this->id = $id;
    }
    
    protected function parametres() {
        $parametres = new Parameters();
        $parametres->add(table_users::id, $this->id);
        
        return $parametres;
    }

    protected function requeteSQL() {
        $requete = " SELECT ";
        $requete .= " * ";
        $requete .= " FROM {table1} ";
        $requete .= " WHERE ";
        $requete .= table_users::id ." = :id ";
        
        return $requete;
    }

    protected function tables() {
        return array(table_users::NAME_TABLE);
    }

    protected function retours(\PDOStatement $req) {
        $row = $req->fetch();
        
        if ($row) {
            $u = new Utilisateur();
            $u->setEmail($row[table_users::email]);
            $u->setIdentifiant($row[table_users::username]);
            $u->setMotDePasse($row[table_users::password]);
        }
        
        return $u;
    }
}

?>
