<?php


class Menu {
    
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
        $bloc["menuValue"] = utf8_encode($values['value']);
        $bloc["menuUrl"] = $values['url'];
        
        return Page::construirePagePartielle($template, $bloc);
    }
    
    public function getMenu($listMenus) {
        /*if (!isset($this->templateAjax))
            throw new Exception ("Erreur: Renseignement du template \"ajax\" inconnu pour le menu");
        
        if (!isset($this->templateParentMenu))
            throw new Exception ("Erreur: Renseignement du template \"menu_parent\" inconnu pour le menu");
        
        if (!isset($this->templateSimpleUrl))
            throw new Exception ("Erreur: Renseignement du template \"simple_url\" inconnu pour le menu");*/
        
        //effectuer un tri des menus
        $menusTriesLogin = array_sort($listMenus, $this->sortColumnName);
        $menu = "";
        foreach ($menusTriesLogin as $values) {
            if ($this->langage == $values['code']) {
                switch ($values['type_url']) {
                    case "ajax": $template = $this->templateAjax; break;
                    case "ext":  $template = $this->templateSimpleUrl; break;
                    default: break;
                }
                $menu .= $this->buildUrlMenu($values, $template);
            }
        }
        
        return $menu;
    }
    
}

?>
