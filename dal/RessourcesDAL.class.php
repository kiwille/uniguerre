<?php

require_once WOOTOOK_DIR_TOOLS . '/secure.php';

class RessourcesDAL {

    static function getRessources(){
        $requete = "SELECT * FROM {table1}";
        $tables = array("ressources");

        try {
            $sql = new _SQL();

            $sql->connexion();
            $req = $sql->prepare($requete,$tables);
            // $sql->parametre($req);
            $sql->execute($req);
            $result = $req->fetchAll(PDO::FETCH_ASSOC);

            $sql->deconnexion();

            return $result;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
}

?>
