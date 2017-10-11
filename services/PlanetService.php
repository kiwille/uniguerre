<?php

class PlanetService {
    
    ///////////////////////////////////////
    // PUBLIC METHOD
    ///////////////////////////////////////
    /**
     * Récupère les planètes d'un utilisateur
     * 
     * @param \User $user
     * @return type
     */
    public static function getPlanetsUser(\User $user) {
        $planets = PlanetDAO::selectAll();
        
        $planetsUser = array();
        foreach ($planets as $planet) {
            if ($planet->id_user == $user->id_user) {
                $planetsUser[] = $planet;
            }
        }
        return $planetsUser;
    }
    
    /**
     * 
     * @param \User $user
     * @return type
     */
    public static function getMainPlanet(\User $user) {
        $planets = PlanetDAO::selectAll();
        
        foreach ($planets as $planet) {
            if ($planet->id_user == $user->id_user && $planet->is_main_planet) {
                $planetImage = PlanetImageDAO::selectById($planet->id_planet_image);
                $planet->setPlanetImage($planetImage);
                return $planet;
            }
        }
        return null;
    }
    
    
    /**
     * Permet de créer la première planète à un nouveau joueur
     * 
     * @param type $id_user
     */
    function createMainPlanet(\User $user) {
        try {
            //Récupération du paramétrage de la planète
            //TODO A mettre dans la table configuration
            $maxSizePlanet = 200;
            $randomMinTemperature = rand(-35, 10);
            $randomMaxTemperature = $randomMinTemperature + rand(10, 40);
            $nameDefaultMainPlanet = "Planète mère";
            
            //Créer l'image de la planète
            $mainPlanetImage = new \PlanetImage();
            $mainPlanetImage->img_moon = $this->generateImgMoon();
            $mainPlanetImage->img_planet = $this->generateImgPlanet();
            $mainPlanetImage->img_starfield = $this->generateImgStarfield();
            //...

            
            $mainPlanet = new \Planet();
            $mainPlanet->is_main_planet = true;
            $mainPlanet->id_planet_image = $mainPlanetImage;
            $mainPlanet->id_user = $user;
            $mainPlanet->max_size = $maxSizePlanet; 
            $mainPlanet->min_temperature = $randomMinTemperature;
            $mainPlanet->max_temperature = $randomMaxTemperature;
            $mainPlanet->name = $nameDefaultMainPlanet;
        } catch (Exception $e) {
            throw new Exception("Erreur durant la création de la planète mère du joueur " . $user);
        }
    }
    
    
    
    
    ///////////////////////////////////////
    // PRiVATE METHOD
    ///////////////////////////////////////
    private function generateImgStarfield() {
        $img_starfield = $config[ConfigurationKey::prefix_img_starfield];
        $img_starfield = rand(0, $config[ConfigurationKey::number_img_starfield]);
        return $img_starfield;
    }
    
    private function generateImgMoon() {
        $img_moon = $config[ConfigurationKey::prefix_img_moon];
        $img_moon = rand(0, $config[ConfigurationKey::number_img_moon]);
        return $img_moon;
    }
    
    private function generateImgPlanet() {
        $img_planet = $config[ConfigurationKey::prefix_img_planet];
        $img_planet = rand(0, $config[ConfigurationKey::number_img_planet]);
        return $img_planet;
    }
}

