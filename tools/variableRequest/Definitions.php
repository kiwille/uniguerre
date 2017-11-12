<?php

class Definitions {
    
    private $definitions;
    
    public function __construct(\FilterValidate $filterValidate, $flags = null, \Options $options = null) {
        $this->definitions = array(
            'filter'    => $filterValidate,
            'flags'     => $flags, 
            'options'   => $options
        );
    }
    
    protected function getDefinitions() {
        return $this->definitions;
    }
    
}
