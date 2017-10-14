<?php

define("TEMPLATE_AJAX", "part_navbar_menu_ingame");
define("TEMPLATE_SIMPLE_URL", "part_navbar_menu_simpleurl");
define("TEMPLATE_PARENT_MENU", "part_navbar_menu_parentmenu");

define("SORT_COLUMN_NAME", T_Menus::numberSort);

function buildUrlMenu($values, $navbar_menu_links, $template) {
    global $langage;
    
    if ($navbar_menu_links != null) {
        $bloc["navbar_menu_links"] = $navbar_menu_links;
    }
    $bloc["menuValue"] = utf8_encode(TranslationService::translate($langage->id_language, $values->denomination)->value);
    $bloc["menuUrl"] = $values->url;
    return Page::construirePagePartielle($template, $bloc);
}

function getMenu($listMenus) {
    global $langage;
    
    //Filtrage entre les différents menus
    $parentsMenus = array();
    $linksMenus = array();
    
    //Classification des menus
    foreach($listMenus as $menu) {
        if ($menu->id_parent_menu == NULL) {
            $parentsMenus[] = $menu;
        } else {
            $linksMenus[] = $menu;
        }
    }
    
    //effectuer un tri des menus
    $PM_Tri = array_sort($parentsMenus, SORT_COLUMN_NAME);
    $LM_Tri = array_sort($linksMenus, SORT_COLUMN_NAME);
    $HTMLMenu = "";
    //Traitement des menus
    foreach ($PM_Tri as $parentMenu) {
        if ($parentMenu->type_url == Menu::TYPE_URL_AJAX || $parentMenu->type_url == Menu::TYPE_URL_EXTERNE) {
            switch ($parentMenu->type_url) {
                case Menu::TYPE_URL_AJAX:
                    $template = TEMPLATE_AJAX;
                    break;
                case Menu::TYPE_URL_EXTERNE:
                    $template = TEMPLATE_SIMPLE_URL;
                    break;
                default: break;
            }
            $HTMLMenu .= buildUrlMenu($parentMenu, null, $template);
        } else {
            $navbar_menu_links = "";
            foreach ($LM_Tri as $linkmenu) {
                if ($linkmenu->id_parent_menu == $parentMenu->id_menu) {
                    switch ($linkmenu->type_url) {
                        case Menu::TYPE_URL_AJAX:
                            $template = TEMPLATE_AJAX;
                            break;
                        case Menu::TYPE_URL_EXTERNE:
                            $template = TEMPLATE_SIMPLE_URL;
                            break;
                        default: break;
                    }
                    $navbar_menu_links .= buildUrlMenu($linkmenu, null, $template);
                }
            }

            $HTMLMenu .= buildUrlMenu($parentMenu, $navbar_menu_links, TEMPLATE_PARENT_MENU);
        }
    }
    return $HTMLMenu;
}
