<?php

class Menu {

    const TYPE_URL_AJAX = "ajax";
    const TYPE_URL_EXTERNE = "extr";
    
    public $id_menu;
    public $id_parent_menu;
    public $denomination;
    public $accessibility;
    public $type_url;
    public $url;
    public $is_in_game;
    public $number_sort;
   
}