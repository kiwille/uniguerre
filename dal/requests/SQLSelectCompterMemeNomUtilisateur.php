<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SQLSelectCompterMemeNomUtilisateur
 *
 * @author Alves
 */
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
        //TODO Réécrire la requete de la meme forme que les autres classes.
        return "SELECT COUNT(*) AS nbJoueur FROM {table1} WHERE username = :username OR email =:email";
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
