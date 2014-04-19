<?php

//require_once '../config.php';

/**
 * La classe _SQL permet de simplifier les requetes SQL.
 *
 * @author Alves
 * @version 1.1
 */
class _SQL {

    /** Variable d'interface d'abstraction à l'accès de données */
    protected $pdo;

    /** Tableau de paramètres pour une requete */
    private $param;

    /**
     * Constructeur de la classe _SQL.
     */
    function __construct() {
        $this->param = array();
    }

    /**
     * Permet la connexion à la base de données.
     */
    public function connexion() {
        try {
            $base = "mysql:host=" . HOSTNAME . ";dbname=" . DATABASE;
            $user = USERNAME;
            $pass = PASSWORD;
            $this->pdo = new PDO($base, $user, $pass);
        } catch (Exception $ex) {
            throw new Exception("Échec de la connexion : " . $ex->getMessage(), E_USER_ERROR);
        }
    }

    /**
     * Permet la déconnexion à la base de données.
     */
    public function deconnexion() {
        $this->param = null;
        $this->pdo = null;
    }

    /**
     * Créer un paramètre pour une requête
     * 
     * @param String $valeur
     * @return int index où la valeur a été stocké
     */
    public function parameter($valeur) {
        return array_push($this->param, $valeur);
    }

    /**
     * Execute la requête. Le préfix est ajouté automatiquement au nom de la table.
     * 
     * @example $sql->query("SELECT * FROM {table1} t1, {table2} t2 WHERE t1.idT1 = t2.idT1;", array("Table1", "Table2"));
     * @param string $requete Requete à exécuter
     * @param array $tables Liste des tables de la requete
     * @return PDOStatement
     * @throws Exception
     */
    public function query($requete, $tables) {
        try {
            if (is_array($tables)) {
                foreach ($tables as $id => $table) {
                    $requete = str_replace("{table" . ($id + 1) . "}", PREFIXTB . $table, $requete);
                }
            } else {
                $requete = str_replace("{table}", PREFIXTB . $tables, $requete);
            }

            //var_dump($requete);
            $req = $this->pdo->prepare($requete);
            $success = $req->execute($this->param);

            if (!$success) {
                throw new ErrorException("La requête n'a pas pu être exécuté en raison d'une erreur");
            }

            return $req;
        } catch (ErrorException $exc) {
            throw new Exception("Erreur exécution SQL : " . $exc->getMessage());
        } catch (Exception $exc) {
            throw new Exception("Echec exécution SQL" . $exc->getMessage());
        }
    }

    /**
     * Retourne l'objet PDO utilisé par derniere connexion.
     * Inutilisable après une déconnexion.
     * 
     * @return PDO
     */
    public function getPDO() {
        return $this->pdo;
    }

}

?>