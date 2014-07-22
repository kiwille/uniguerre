<?php

require_once 'SqlBase.php';

/**
 *
 * @author Alves
 */
abstract class SqlRead extends SqlBase {
    
    /**
     * @return array Obtient les éléments de retour
     */
    protected abstract function retours(PDOStatement $req);
    
    /**
     * Retourne le résultat de la requete
     * @return PDOStatement 
     */
    public function read() {
        $requete = $this->getRequeteSQL();
        $tables = $this->getTables();
        
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
            
            $result = $this->retours($req);

            $sql->deconnexion();

            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
        
    }
    
}

?>
