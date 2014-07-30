<?php

class Ressources {

    private $rid;
    private $name;
    private $coefprod;

    public function getRid() {
        return $this->rid;
    }

    public function setRid($rid) {
        $this->rid = $rid;
    }
    
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getCoefProd() {
        return $this->coefprod;
    }

    public function setCoefProd($coefprod) {
        $this->coefprod = $coefprod;
    }
}
?>
