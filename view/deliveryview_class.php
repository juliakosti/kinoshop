<?php

require_once 'mainview_class.php';

class DeliveryView extends MainView
{

	 public function __construct()
    {   
    	parent::__construct();
    	$this->pagetitle = 'Страница доставки kinoshop.ru';
    	$this->description = 'Страница доставки Интернет-магазина фильмов и сериалов kinoshop.ru';
    	
    	//include_once 'tmpl/delivery.tpl';
        
    }

    public function getViewContent()
    {
        include_once 'tmpl/delivery.tpl';
    }
}