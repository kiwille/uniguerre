<?php

class Utilisateur {

    private $id;
    private $langage;
    private $identifiant;
    private $motDePasse;
    private $email;
    private $idPlaneteMere;
    
    /**
     * 
     * @return  Integer
     */
    public function getId() {
        return $this->id;
    }

    /**
     * 
     * @param \Integer $id
     */
    public function setId($id) {
        $this->id = $id;
    }
    
    /**
     * 
     * @return \Langage
     */
    public function getLangage() {
        return $this->langage;
    }

    /**
     * 
     * @param \Langage $langage
     */
    public function setLangage($langage) {
        $this->langage = $langage;
    }
    
    public function getIdentifiant() {
        return $this->identifiant;
    }

    public function setIdentifiant($identifiant) {
        $this->identifiant = $identifiant;
    }

    public function getMotDePasse() {
        return $this->motDePasse;
    }

    public function setMotDePasse($motDePasse) {
        $this->motDePasse = $motDePasse;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getIdPlaneteMere() {
        return $this->idPlaneteMere;
    }

    public function setIdPlaneteMere($idPlaneteMere) {
        $this->idPlaneteMere = $idPlaneteMere;
    }
}
?>
