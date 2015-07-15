<?php

class MenuDAO extends DataAccessModel {
    
 
    public static function add($obj) {
        
    }

    public static function delete($id) {
        
    }

    public static function selectAll() {
        return (new SQLSelectMenus())->read();
    }

    public static function selectById($id) {
        
    }

    public static function update($obj, $id) {
        
    }
    
    public static function selectAppropriateMenu($is_in_game) {
        $menus = MenuDAO::selectAll();
        
        $appropriateMenu = array(); 
        foreach ($menus as $menu) {
            if ($menu->is_in_game == $is_in_game) {
                $appropriateMenu[] = $menu;
            }
        }
        
        return $appropriateMenu;
    }

}