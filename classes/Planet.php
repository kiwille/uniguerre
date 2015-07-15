<?php

class Planet {
    
    public $id_planet;
    public $id_planet_image;
    public $id_user;
    public $name;
    
    private $planet_image;
    
    function getPlanetImage() {
        return $this->planet_image;
    }

    function setPlanetImage(\PlanetImage $planet_image) {
        $this->planet_image = $planet_image;
    }


}
