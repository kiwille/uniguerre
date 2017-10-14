<?php

require_once dirname(__FILE__) . '/SqlBase.php';

/**
 *
 * @author Alves
 */
abstract class SqlRead extends SqlBase {

    /**
     * @return array Obtient les éléments de retour
     */
    abstract protected function retours(PDOStatement $req);

    /**
     * Retourne le résultat de la requete
     * @return PDOStatement 
     */
    public function read() {
        try {
            $requete = $this->requeteSQL();
            $tables = $this->tables();
            $parametres = (!is_null($this->parametres())) ? $this->parametres()->getParametres() : null;

            $sql = new _SQL();

            $sql->connexion();
            $req = $sql->prepare($requete, $tables);

            if (!is_null($parametres) && is_array($parametres)) {
                $this->addParametresAuSQL($sql, $req, $parametres);
            }

            $sql->execute($req);

            $result = $this->retours($req);
            $sql->deconnexion();

            return $result;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    /**
     * Ajoute les paramètres Sql à classe _SQL
     * 
     * @param _SQL $sql
     * @param type $req
     * @param type $parametres
     * @return type
     */
    private function addParametresAuSQL($sql, $req, $parametres) {
        foreach ($parametres as $champ => $valeur) {
            $sql->parametre($req, $champ, $valeur);
        }
        
        return $sql;
    }
}