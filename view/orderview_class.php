<?php

require_once 'mainview_class.php';

class OrderView extends MainView
{

	 public function __construct()
    {   
    	parent::__construct();
    	include_once 'tmpl/order.tpl';
        
    }
}