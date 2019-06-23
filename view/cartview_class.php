<?php

require_once 'mainview_class.php';

class CartView extends MainView
{

	 public function __construct()
    {   
    	parent::__construct();
    	$this->pagetitle = 'Корзина интернет-магазин фильмов и сериалов kinoshop.ru';
    	$this->description = 'содержимое корзины интернет-магазин фильмов и сериалов kinoshop.ru';
    	//include_once 'tmpl/cart.tpl';
        
    }

    public function getViewContent()
    {
    	include_once 'tmpl/cart.tpl';
    }
}