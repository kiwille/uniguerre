<?php

class Menu {

    const TYPE_URL_AJAX = "ajax";
    const TYPE_URL_EXTERNE = "extr";

    var $templateAjax;
    var $templateSimpleUrl;
    var $templateParentMenu;
    var $sortColumnName;
    var $langage;

    public function getTemplateAjax() {
        return $this->templateAjax;
    }

    public function setTemplateAjax($templateAjax) {
        $this->templateAjax = $templateAjax;
    }

    public function getTemplateSimpleUrl() {
        return $this->templateSimpleUrl;
    }

    public function setTemplateSimpleUrl($templateSimpleUrl) {
        $this->templateSimpleUrl = $templateSimpleUrl;
    }

    public function getTemplateParentMenu() {
        return $this->templateParentMenu;
    }

    public function setTemplateParentMenu($templateParentMenu) {
        $this->templateParentMenu = $templateParentMenu;
    }

    public function getSortColumnName() {
        return $this->sortColumnName;
    }

    public function setSortColumnName($sortColumnName) {
        $this->sortColumnName = $sortColumnName;
    }

    public function getLangage() {
        return $this->langage;
    }

    public function setLangage($langage) {
        $this->langage = $langage;
    }

    private function buildUrlMenu($values, $template) {
        if ($template == $this->templateParentMenu) {
            $bloc["navbar_menu_links"] = $values["navbar_menu_links"];
        }
        $bloc["menuValue"] = utf8_encode($values[table_translations::value]);
        $bloc["menuUrl"] = $values[table_menus::url];

        return Page::construirePagePartielle($template, $bloc);
    }

    public function getMenu($listMenus) {
        if (!isset($this->templateAjax))
            throw new Exception("Erreur: Renseignement du template \"ajax\" inconnu pour le menu");

        if (!isset($this->templateParentMenu))
            throw new Exception("Erreur: Renseignement du template \"menu_parent\" inconnu pour le menu");

        if (!isset($this->templateSimpleUrl))
            throw new Exception("Erreur: Renseignement du template \"simple_url\" inconnu pour le menu");


        //Filtrage entre les différents menus
        $parentsMenus = array();
        $linksMenus = array();
        foreach ($listMenus as $menu) {
            if ($this->langage == $menu[table_languages::code]) {
                if ($menu[table_menus::id_parentmenu] == null) {
                    $parentsMenus[] = $menu;
                } else {
                    $linksMenus[] = $menu;
                }
            }
        }

        //effectuer un tri des menus
        $PM_Tri = array_sort($parentsMenus, $this->sortColumnName);
        $LM_Tri = array_sort($linksMenus, $this->sortColumnName);

        $HTMLMenu = "";
        //Traitement des menus
        foreach ($PM_Tri as $parentMenu) {
            if ($parentMenu[table_menus::type_url] == self::TYPE_URL_AJAX || $parentMenu[table_menus::type_url] == self::TYPE_URL_EXTERNE) {
                switch ($parentMenu[table_menus::type_url]) {
                    case self::TYPE_URL_AJAX:
                        $template = $this->templateAjax;
                        break;
                    case self::TYPE_URL_EXTERNE:
                        $template = $this->templateSimpleUrl;
                        break;
                    default: break;
                }
                $HTMLMenu .= $this->buildUrlMenu($parentMenu, $template);
            } else {
                $navbar_menu_links = "";
                foreach ($LM_Tri as $linkmenu) {
                    if ($linkmenu[table_menus::id_parentmenu] == $parentMenu[table_menus::idmenu]) {
                        switch ($linkmenu[table_menus::type_url]) {
                            case self::TYPE_URL_AJAX:
                                $template = $this->templateAjax;
                                break;
                            case self::TYPE_URL_EXTERNE:
                                $template = $this->templateSimpleUrl;
                                break;
                            default: break;
                        }
                        $navbar_menu_links .= $this->buildUrlMenu($linkmenu, $template);
                    }
                }
                
                $parentMenu["navbar_menu_links"] = $navbar_menu_links;

                $HTMLMenu .= $this->buildUrlMenu($parentMenu, $this->templateParentMenu);
            }
        }

        return $HTMLMenu;
    }

}

?>
