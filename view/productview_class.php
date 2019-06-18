<?php

require_once 'mainview_class.php';

class ProductView extends MainView
{

	 public function __construct()
    {   
    	parent::__construct();
    	include_once 'tmpl/product.tpl';
        
    }
}