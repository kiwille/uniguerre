<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Langage
 *
 * @author Alves
 */
class Langage {

    private $_id;
    private $_code;
    private $_name;

	/* pour l'instant on met rien mais on c'est jamais */
	public function __construct($id,$code,$name)
	{
		$this->_id = $id;
		$this->_code = $code;
		$this->_name = $name;
		
    }
	
    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function getCode() {
        return $this->_code;
    }

    public function setCode($code) {
        $this->_code = $code;
    }

    public function getName() {
        return $this->_name;
    }

    public function setName($name) {
        $this->_name = $name;
    }

}

?>
