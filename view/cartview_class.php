<?php

require_once 'mainview_class.php';

class CartView extends MainView
{

	 public function __construct()
    {   
    	parent::__construct();
    	include_once 'tmpl/cart.tpl';
        
    }
}