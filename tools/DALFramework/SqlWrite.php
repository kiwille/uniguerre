<?php

require_once 'SqlBase.php';

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SqlWrite
 *
 * @author Alves
 */
abstract class SqlWrite extends SqlBase {
    
    public function write()
    {
        $requete = $this->requeteSQL();
        $tables = $this->tables();
        
        try {
            $sql = new _SQL();

            $sql->connexion();
            $req = $sql->prepare($requete,$tables);
            
            $parametres = $this->getParameters();
            if (isset($parametres)) {
                foreach ($parametres as $champ => $valeur) {
                    $sql->parametre($req, $champ, $valeur);
                }
            }
            
            $sql->execute($req);

            $sql->deconnexion();
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
}

?>
