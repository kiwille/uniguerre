<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Parameters
 *
 * @author Alves
 */
class Parameters {
    
    private $parameters = array();
    
    public function add($champ, $valeur) {
        $this->parameters[$champ] = $valeur;
    }
    
    public function getParameters() {
        return $this->parameters;
    }
    
}

?>
