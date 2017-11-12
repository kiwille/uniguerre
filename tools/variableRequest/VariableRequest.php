<?php

class VariableRequest {
    
    /*public static function createDefault(
        $inputType,
        $filterSanitize
    ) {
        self::isInArray($inputType, Input::values(), "INPUT");
        self::isInArray($filterSanitize, FilterSanitize::values(), "FILTER_SANITIZE");
        
        return array(
            'inputType'         => $inputType,
            'filterSanitize'    => $filterSanitize
        );
    }*/
    
    public static function create(
        $inputType,
        $filterValidate, 
        $filterSanitize = null,
        array $flags = array(FILTER_FLAG_NONE), 
        \Options $options = null
    ) {
        self::isInArray($inputType, Input::values(), "INPUT");
        self::isInArray($filterValidate, FilterValidate::values(), "FILTER_VALIDATE");
        if ($filterSanitize != null) {
            self::isInArray($filterSanitize, FilterSanitize::values(), "FILTER_SANITIZE");
        }
        
        if ($filterValidate != FilterValidate::FILTER_VALIDATE_STRING && $filterSanitize != null) {
            throw new Exception("Incompatibles parameters FILTER_VALIDATE with FILTER_SANITIZE");
        }
        
        if ($filterSanitize != null && $options != null) {
            throw new Exception("Incompatibles parameters FILTER_SANITIZE with OPTIONS");
        }
        
        $arrayFilter = array();
        if ($filterValidate != FilterValidate::FILTER_VALIDATE_STRING) {
            $arrayFilter = array(
                'inputType'         => $inputType,
                'filterValidate'    => $filterValidate,
                'flags'             => $flags, 
                'options'           => $options
            );
        } else if ($filterValidate == FilterValidate::FILTER_VALIDATE_STRING && $filterSanitize != null) {
            $arrayFilter = array(
                'inputType'         => $inputType,
                'filterSanitize'    => $filterSanitize,
                'flags'             => $flags
            );
        }
        
        return $arrayFilter;
    }
    
    /**
     * Récupère les valeurs externes par rapport au tableau passé en paramètre.
     * Ce tableau est construit grâce à la méthode <b>create()</b>
     * 
     * @param type $array
     * @return type
     */
    public static function getParameters($array) {
        $result = array();
        
        foreach($array as $key => $value) {
            if ($value['inputType'] == Input::INPUT_SESSION) {
                $result[$key] = self::getValueSession($value, $key);
            } else {
                $inputType = $value['inputType'];
                
                $definitions = array();
                if (isset($value['filterSanitize'])) {
                    $definitions = array(
                        $key => $value['filterSanitize']
                    );
                } else {
                    $definitions = array(
                        $key => array (
                            'filter'    => $value['filterValidate'],
                            'flags'     => $value['flags'], 
                            'options'   => $value['options']
                        )
                    );
                }
                $result[$key] = filter_input_array($inputType, $definitions, true)[$key];
            }
        }
        
        return $result;
    }
    
    /**
     * Vérifie la présence d'une valeur dans un tableau.
     * Retourne <b>TRUE</b> si <i>value</i> est présent dans le tableau, sinon lève une exception.
     * 
     * @param mixed $value
     * @param array $array
     * @param string $key
     * @throws Exception
     */
    private static function isInArray($value, array $array, $key) {
        if (!in_array($value, $array)) {
            throw new Exception("Parameters " . $key . " with value " . $value . " is invalid!");
        }
        
        return true;
    }
    
    /**
     * Méthode réservée pour la récupération des valeurs d'une session
     * 
     * @param type $value
     * @param type $key
     * @return type
     */
    private static function getValueSession($value, $key) {
        $valSession = null;
        
        if (isset($_SESSION[$key]) && isset($value) && isset($value['filterValidate'])) {
            switch ($value['filterValidate']) {
                case FilterValidate::FILTER_VALIDATE_INT:
                    $valSession = intval($_SESSION[$key]);
                    break;
                case FilterValidate::FILTER_VALIDATE_FLOAT:
                    $valSession = floatval($_SESSION[$key]);
                    break;
                case FilterValidate::FILTER_VALIDATE_BOOLEAN:
                    $valSession = boolval($_SESSION[$key]);
                    break;
                default:
                    $valSession = $_SESSION[$key];
                    break;
            }
        }
        
        return $valSession;
    }
}
