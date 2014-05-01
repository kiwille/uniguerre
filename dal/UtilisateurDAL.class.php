<?php

require_once WOOTOOK_DIR_TOOLS . '/secure.php';

class UtilisateurDAL {

    static function getUtilisateur($id) { // ATTENTION: A TESTER !!!
        $requete = "SELECT * FROM {table1} WHERE id = :id ";
        $tables = array("users");

        try {
            $sql = new _SQL();

            $sql->connexion();
            $req = $sql->prepare($requete, $tables);
            $sql->parametre($req, "id", $id);
            $sql->execute($req);
            while ($row = $req->fetch()) {
                $u = new Utilisateur();
                $u->setEmail($row["mail"]);
                $u->setIdentifiant($row["username"]);
                $u->setMotDePasse($row["password"]);
            }

            $sql->deconnexion();

            return $u;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    static function insertUtilisateur(Utilisateur $utilisateur) { //ok
        $requete = "INSERT INTO {table1}";
        $requete .= "(username, password, email) ";
        $requete .= "VALUES (:username, :password, :email);";
        $tables = array("users");

        try {
            $sql = new _SQL();

            $sql->connexion();
            $req = $sql->prepare($requete, $tables);
            $sql->parametre($req, ":username", $utilisateur->getIdentifiant());
            $sql->parametre($req, ":password", $utilisateur->getMotDePasse());
            $sql->parametre($req, ":email", $utilisateur->getEmail());
            $sql->execute($req);
            $sql->deconnexion();
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

    static function verifierIdentiteConnexion($identifiant, $motDePasse) {
        $requete = "SELECT * FROM {table1} WHERE username = :username ";
        $tables = array("users");
        $id = null;

        try {
            $sql = new _SQL();

            $sql->connexion();
            $req = $sql->prepare($requete, $tables);
            $sql->parametre($req, "username", $identifiant);
            $sql->execute($req);
            while ($row = $req->fetch()) {
				if ( crypt($motDePasse, $row["password"]) === $row["password"]) {
					$id=$row["id"];
					//echo "Connection r&eacute;ussi";
				} else {
					$id=-1;
					//echo "Mot de passe incorrect";
				}
            }

            $sql->deconnexion();

            return $id;
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }

}

?>
