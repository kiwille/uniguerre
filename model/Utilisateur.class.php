<?php

class Utilisateur {

    private $identifiant;
    private $motDePasse;
    private $email;
    private $idPlaneteMere;

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
